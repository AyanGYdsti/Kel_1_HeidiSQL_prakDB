<?php

use app\models\Indikator;
use app\models\Prodi;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$prodi = ArrayHelper::map(Prodi::find()->all(), 'id_prodi', 'nama_prodi');
$indikator = ArrayHelper::map(Indikator::find()->all(), 'id_indikator', 'nama_indikator');
/** @var yii\web\View $this */
/** @var app\models\PenilaianProdi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="penilaian-prodi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_indikator')->dropDownList(
        $indikator, // Data untuk dropdown
        ['prompt' => 'Pilih Indikator'] // Placeholder
    )->label('Indikator Akreditasi') ?>

    <?= $form->field($model, 'id_prodi')->dropDownList(
        $prodi, // Data untuk dropdown
        ['prompt' => 'Pilih Prodi'] // Placeholder
    )->label('Prodi') ?>

    <?= $form->field($model, 'nilai')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>