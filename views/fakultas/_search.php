<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\FakultasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fakultas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_fakultas') ?>

    <?= $form->field($model, 'id_univ') ?>

    <?= $form->field($model, 'nama_fakultas') ?>

    <?= $form->field($model, 'singkatan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
