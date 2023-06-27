<?php

use app\models\Noticia;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Noticias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="noticia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Noticia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //    ['class' => 'yii\grid\SerialColumn'],

            'idnoticia',
            'titular',
            //'textoCorto',
            //'textoLargo:ntext',
            //'portada',
            'seccion0.nombre',
            'fecha',
            //'foto',
            'autor0.nombre',

            [
                'attribute' => 'foto',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::img('@web/imgs/' . $model->foto, ['class' => 'col-lg-6']);
                }
            ],


            //modificar loa presentacion del campo portada



            [
                'attribute' => 'portada',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->portada == 1 ? '<i class="far fa-check-square"></i>' : '<i class="fas fa-do-not-enter"></i>';
                }
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Noticia $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idnoticia' => $model->idnoticia]);
                }
            ],
        ],
    ]); ?>


</div>