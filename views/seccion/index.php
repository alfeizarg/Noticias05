<?php

use app\models\Seccion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Secciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seccion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Sección', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',


            [
                'attribute' => 'foto',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::img('@web/imgs/secciones/' . $model->foto, ['class' => 'col-lg-2']);
                }
            ],


            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Seccion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>