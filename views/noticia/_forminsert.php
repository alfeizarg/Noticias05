<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Noticia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="noticia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idnoticia')->Input('number'); ?>

    <?= $form->field($model, 'titular')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'textoCorto')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'textoLargo')->textarea(['rows' => 6]); ?>

    <?= $form->field($model, 'portada')->checkbox(); ?>



    <?= $form->field($model, 'seccion')->dropDownList($model->getSecciones()); ?>





    <?= $form->field($model, 'fecha')->input('date'); ?>



    <?= $form->field($model, 'autor')->dropDownList($model->autores); ?>


    <?= $form->field($model, 'archivo')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>