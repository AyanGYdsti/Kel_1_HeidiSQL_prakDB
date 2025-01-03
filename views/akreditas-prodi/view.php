<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\AkreditasProdi $model */

$this->title = $model->id_akreditas;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Akreditasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="akreditas-prodi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id_akreditas' => $model->id_akreditas], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id_akreditas' => $model->id_akreditas], [
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
            'id_akreditas',
            [
                'attribute' => 'id_prodi',
                'value' => $model->prodi->nama_prodi,
            ],
            [
                'attribute' => 'id_kategori',
                'value' => $model->kategori->deskripsi,
            ],
            [
                'attribute' => 'id_lembaga',
                'value' => $model->lembaga->nama_lembaga,
            ],
            'tanggal_mulai',
            'tanggal_akhir',
            'no_sk',
            'lembaga_akreditas',
            'file',
        ],
    ]) ?>

</div>