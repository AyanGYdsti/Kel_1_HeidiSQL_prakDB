<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AkreditasProdi $model */

$this->title = 'Ubah Riwayat Akreditasi: ' . $model->id_akreditas;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Akreditasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_akreditas, 'url' => ['view', 'id_akreditas' => $model->id_akreditas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="akreditas-prodi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>