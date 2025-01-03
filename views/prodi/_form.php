<?php

use app\models\Fakultas;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$fakultas = ArrayHelper::map(Fakultas::find()->all(), 'id_fakultas', 'nama_fakultas');

/** @var yii\web\View $this */
/** @var app\models\Prodi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="prodi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_prodi')->textInput()->label('Kode Prodi') ?>

    <?= $form->field($model, 'id_fakultas')->dropDownList(
        $fakultas, // Data untuk dropdown
        ['prompt' => 'Pilih Fakultas'] // Placeholder
    )->label('Fakultas') ?>
    <?= $form->field($model, 'nama_prodi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenjang')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>