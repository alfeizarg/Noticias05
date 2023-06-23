<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Seccion $model */

$this->title = 'Update Seccion: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Seccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seccion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
