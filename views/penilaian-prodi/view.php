<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\PenilaianProdi $model */

$this->title = $model->tahun;
$this->params['breadcrumbs'][] = ['label' => 'Penilaian Akreditasi Prodi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="penilaian-prodi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'tahun' => $model->tahun, 'id_indikator' => $model->id_indikator, 'id_prodi' => $model->id_prodi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'tahun' => $model->tahun, 'id_indikator' => $model->id_indikator, 'id_prodi' => $model->id_prodi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tahun',
            [
                'attribute' => 'id_indikator',
                'value' => $model->indikator->nama_indikator,
            ],
            [
                'attribute' => 'id_prodi',
                'value' => $model->prodi->nama_prodi,
            ],
            'nilai',
        ],
    ]) ?>

</div>