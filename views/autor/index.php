<?php

use app\models\Autor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Autores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear autor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',

            [
                'attribute' => 'foto',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::img('@web/imgs/autores/' . $model->foto, ['class' => 'col-lg-6']);
                }
            ],


            'foto',
            'fechaNacimiento',
            'correo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Autor $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>




</div>