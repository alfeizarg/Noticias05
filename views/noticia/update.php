<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Noticia $model */

$this->title = 'Update Noticia: ' . $model->idnoticia;
$this->params['breadcrumbs'][] = ['label' => 'Noticias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idnoticia, 'url' => ['view', 'idnoticia' => $model->idnoticia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="noticia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formUpdate', [
        'model' => $model,
    ]) ?>

</div>