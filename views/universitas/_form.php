<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Universitas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="universitas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_univ')->textInput()->label('Kode Universitas') ?>

    <?= $form->field($model, 'nama_lembaga')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>