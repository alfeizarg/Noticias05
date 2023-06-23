<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Autor $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="autor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->input('number') ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaNacimiento')->input('date') ?>

    <?= $form->field($model, 'correo')->textInput('email') ?>

    <?= $form->field($model, 'archivo')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>