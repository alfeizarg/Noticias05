<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seccion".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string null $foto
 * @property Noticia[] $noticias
 */
class Seccion extends \yii\db\ActiveRecord
{

    public $archivo; //para almacenar el fichero de la foto


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seccion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['nombre', 'foto'], 'string', 'max' => 100],
            [['id'], 'unique'],


            [
                ['archivo'], 'file',
                'skipOnEmpty' => true, // no es obligatorio seleccionas un archivo
                'extensions' => 'jpg,bmp,gif,png' // extensiones permitidas
            ],


        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'foto' => 'Foto'
        ];
    }

    /**
     * Gets query for [[Noticias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNoticias()
    {
        return $this->hasMany(Noticia::class, ['seccion' => 'id']);
    }









    public function subirArchivo(): bool
    {
        $this->archivo->saveAs('imgs/secciones/' . $this->id . $this->archivo->name);
        return true;
    }



    /**
     * antes de validar cojo los archivos enviados y
     * los coloco en el modelo
     * 
     */
    public function beforeValidate()
    {
        //si he seleccionado un archivo en el formulario

        if (isset($this->archivo)) {

            $this->archivo = \yii\web\UploadedFile::getInstance($this, 'archivo');
        }
        return true;
    }

    public function afterValidate()
    {

        //si he seleccionado un archivo en el formulario
        if (isset($this->archivo)) {


            $this->subirArchivo();

            $this->foto = $this->id .  $this->archivo->name;
        }

        return true;
    }


    /**
     * afterSave
     *
     * @param  mixed $insert
     * @param  mixed $atributosAnteriores
     * @return void
     */
    public function afterSave($insert, $atributosAnteriores)
    {

        if (!$insert) {

            if (isset($this->archivo)) {

                if (isset($atributosAnteriores["foto"]) && $atributosAnteriores["foto"] != "") {

                    unlink('imgs/secciones/' . $atributosAnteriores["foto"]);
                }
            }
        }
    }

    public function afterDelete()
    {
        unlink('imgs/secciones' . $this->foto); //elimino la imagen de la noticia, cuando borro la noticia
    }
}
