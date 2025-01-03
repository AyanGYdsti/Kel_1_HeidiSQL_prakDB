<?php

use app\models\KategoriAkreditas;
use app\models\LembagaAkreditas;
use app\models\Prodi;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$prodi = ArrayHelper::map(Prodi::find()->all(), 'id_prodi', 'nama_prodi');
$kategori = ArrayHelper::map(KategoriAkreditas::find()->all(), 'id_kategori', 'deskripsi');
$lembaga = ArrayHelper::map(LembagaAkreditas::find()->all(), 'id_lembaga', 'nama_lembaga');

/** @var yii\web\View $this */
/** @var app\models\AkreditasProdi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="akreditas-prodi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_akreditas')->textInput() ?>

    <?= $form->field($model, 'id_prodi')->dropDownList(
        $prodi, // Data untuk dropdown
        ['prompt' => 'Pilih Prodi'] // Placeholder
    )->label('Prodi') ?>

    <?= $form->field($model, 'id_kategori')->dropDownList(
        $kategori, // Data untuk dropdown
        ['prompt' => 'Pilih Kategori'] // Placeholder
    )->label('Kategori Akreditasi') ?>

    <?= $form->field($model, 'id_lembaga')->dropDownList(
        $lembaga, // Data untuk dropdown
        ['prompt' => 'Pilih Lembaga Akreditasi'] // Placeholder
    )->label('Lembaga Akreditasi') ?>

    <?= $form->field($model, 'tanggal_mulai')->input('date') ?>

    <?= $form->field($model, 'tanggal_akhir')->input('date') ?>

    <?= $form->field($model, 'no_sk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lembaga_akreditas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>