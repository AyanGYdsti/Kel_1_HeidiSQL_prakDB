<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PenilaianProdi $model */

$this->title = 'Update Penilaian Akreditasi Prodi: ' . $model->tahun;
$this->params['breadcrumbs'][] = ['label' => 'Penilaian Akreditasi Prodi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tahun, 'url' => ['view', 'tahun' => $model->tahun, 'id_indikator' => $model->id_indikator, 'id_prodi' => $model->id_prodi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penilaian-prodi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
