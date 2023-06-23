<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "noticia".
 *
 * @property int $idnoticia
 * @property string|null $titular
 * @property string|null $textoCorto
 * @property string|null $textoLargo
 * @property int|null $portada
 * @property int|null $seccion
 * @property string|null $fecha
 * @property string|null $foto
 * @property int|null $autor
 */
class Noticia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'noticia';
    }

    public $archivo;    //se almacena el archivo subido como objeto



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idnoticia'], 'required'],
            [['idnoticia', 'portada', 'seccion', 'autor'], 'integer'],
            [['textoLargo'], 'string'],
            [['fecha'], 'safe'],
            [['titular', 'foto'], 'string', 'max' => 255],
            [['textoCorto'], 'string', 'max' => 800],
            [['idnoticia'], 'unique'],


            [
                ['archivo'], 'file',
                'skipOnEmpty' => true, // no es obligatorio seleccionas un archivo
                'extensions' => 'jpg,bmp.gif,png' // extensiones permitidas
            ],

            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => Autor::class, 'targetAttribute' => ['autor' => 'id']],
            [['seccion'], 'exist', 'skipOnError' => true, 'targetClass' => Seccion::class, 'targetAttribute' => ['seccion' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idnoticia' => 'Idnoticia',
            'titular' => 'Titular',
            'textoCorto' => 'Texto Corto',
            'textoLargo' => 'Texto Largo',
            'portada' => 'Portada',
            'seccion' => 'Seccion',
            'fecha' => 'Fecha',
            'autor' => 'Autor',
            "archivo" => "Suba archivo de imagen"
        ];
    }








    public function subirArchivo(): bool
    {
        $this->archivo->saveAs('imgs/' . $this->idnoticia . $this->archivo->name);
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

            $this->foto = $this->idnoticia .  $this->archivo->name;
        }

        return true;
    }



    public function afterDelete()
    {
        unlink('imgs/' . $this->foto); //elimino la imagen de la noticia, cuando borro la noticia
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

                if (isset($atributosAnteriores["foto"])) {

                    unlink('imgs/' . $atributosAnteriores["foto"]);
                }
            }
        }
    }



    public function getSecciones()
    {
        $secciones = Seccion::find()->all();
        return ArrayHelper::map($secciones, 'id', 'nombre');
    }

    public function getAutores()
    {
        $autores = Autor::find()->all();
        return ArrayHelper::map($autores, 'id', 'nombre');
    }


    /**
     * Gets query for [[Autor0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutor0()
    {
        return $this->hasOne(Autor::class, ['id' => 'autor']);
    }
    /**
     * Gets query for [[Seccion0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeccion0()
    {
        return $this->hasOne(Seccion::class, ['id' => 'seccion']);
    }
}
