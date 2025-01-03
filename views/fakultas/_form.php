<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper; // Untuk membantu memetakan data
use app\models\Universitas;

// Mengubah data dari tabel universitas menjadi array ['id' => 'nama_lembaga']
$universitas = ArrayHelper::map(Universitas::find()->all(), 'id_univ', 'nama_lembaga');

/** @var yii\web\View $this */
/** @var app\models\Fakultas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fakultas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_fakultas')->textInput()->label('Kode Fakultas') ?>

    <?= $form->field($model, 'id_univ')->dropDownList(
        $universitas, // Data untuk dropdown
        ['prompt' => 'Pilih Universitas'] // Placeholder
    )->label('Universitas') ?>

    <?= $form->field($model, 'nama_fakultas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'singkatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>