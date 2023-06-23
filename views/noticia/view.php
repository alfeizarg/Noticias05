<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Noticia $model */

$this->title = $model->idnoticia;
$this->params['breadcrumbs'][] = ['label' => 'Noticias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="noticia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'idnoticia' => $model->idnoticia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'idnoticia' => $model->idnoticia], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estás seguro que quieres borrar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idnoticia',
            'titular',
            'textoCorto',
            'textoLargo:ntext',
            'portada',
            'fecha',

            //'seccion' me saca el id de la seccion
            //'seccion0.nombre', //para sacar el campo nombre de la seccion
            //para hacer un label ELIGE SECCION
            [
                //'label' => 'seccion',
                'attribute' => 'seccion',
                'value' => function ($model) {
                    return $model->seccion0->nombre;
                }
            ],

            //'autor0.nombre', //para sacar el campo nombre del autor
            //para hacer un label AUTOR
            [
                'attribute' => 'autor',
                'value' => function ($model) {
                    return $model->autor0->nombre . " Email:" . $model->autor0->correo;
                }
            ],



            [

                "attribute" => "Archivo",
                "format" => "raw",
                "value" => function ($model) {


                    return \yii\helpers\Html::img(
                        "@web/imgs/" . $model->foto,
                        ["class" => "img-thumbnail"]
                    );


                    //return \yii\helpers\Html::a(
                    //    'Mostrar Pdf' . $model->archivo->name,
                    //    "@web/imgs/" . $model->archivo,
                    //    [
                    //        'class' => 'btn btn-primary'
                    //    ]
                    //);
                }


            ],

            [
                'attribute' => 'portada',
                'value' => function ($model) {
                    return $model->portada == 1 ?

                        "si"
                        : "no";
                }
            ],




        ],
    ]) ?>

</div>