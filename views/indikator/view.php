<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Indikator $model */

$this->title = $model->id_indikator;
$this->params['breadcrumbs'][] = ['label' => 'Indikator Akreditasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="indikator-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id_indikator' => $model->id_indikator], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id_indikator' => $model->id_indikator], [
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
            [
                'attribute' => 'id_indikator',
                'lable' => 'Kode Indikator',
            ],
            [
                'attribute' => 'id_elemen',
                'value' => $model->elemen->nama_elemen,
                'label' => 'Nama Elemen',
            ],
            'nama_indikator:ntext',
            'no_urut',
            'aktif',
        ],
    ]) ?>

</div>