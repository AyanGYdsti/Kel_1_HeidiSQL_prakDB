<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\IndikatorSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="indikator-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_indikator') ?>

    <?= $form->field($model, 'id_elemen') ?>

    <?= $form->field($model, 'nama_indikator') ?>

    <?= $form->field($model, 'no_urut') ?>

    <?= $form->field($model, 'aktif') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
