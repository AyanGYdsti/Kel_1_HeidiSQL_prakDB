<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Prodi; // Pastikan Anda mengimpor model Prodi

/* @var $this yii\web\View */
/* @var $model app\models\search\AkreditasProdiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="akreditas-prodi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php
    // Ambil data Prodi sebagai opsi dropdown
    $prodiOptions = ArrayHelper::map(Prodi::find()->all(), 'id_prodi', 'nama_prodi');
    ?>

    <?= $form->field($model, 'id_prodi')->dropDownList(
        $prodiOptions,
        ['prompt' => 'Pilih Nama Prodi'] // Opsi default
    ) ?>

    <?= Html::submitButton('Filter', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>

    <?php ActiveForm::end(); ?>

</div>