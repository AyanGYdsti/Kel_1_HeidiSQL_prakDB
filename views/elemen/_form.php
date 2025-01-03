<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Elemen $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="elemen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_elemen')->textInput()->label('Kode Elemen Akreditasi') ?>

    <?= $form->field($model, 'nama_elemen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6])->label('Deskrispi Akreditasi') ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>