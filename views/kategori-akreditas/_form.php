<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\KategoriAkreditas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kategori-akreditas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kategori')->textInput()->label('Kode Kategori Akreditasi') ?>

    <?= $form->field($model, 'deskripsi')->textarea(['maxlength' => true, 'rows' => 6])->label('Deskripsi Akreditasi') ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>