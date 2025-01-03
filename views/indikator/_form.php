<?php

use app\models\Elemen;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$elemen = ArrayHelper::map(Elemen::find()->all(), 'id_elemen', 'nama_elemen');
/** @var yii\web\View $this */
/** @var app\models\Indikator $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="indikator-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_indikator')->textInput()->label('Kode Indikator') ?>

    <?= $form->field($model, 'id_elemen')->dropDownList(
        $elemen, // Data untuk dropdown
        ['prompt' => 'Pilih Elemen'] // Placeholder
    )->label('Elemen') ?>

    <?= $form->field($model, 'nama_indikator')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'no_urut')->textInput() ?>

    <?= $form->field($model, 'aktif')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>