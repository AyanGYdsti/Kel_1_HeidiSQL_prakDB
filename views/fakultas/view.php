<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Fakultas $model */

$this->title = $model->id_fakultas;
$this->params['breadcrumbs'][] = ['label' => 'Fakultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fakultas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id_fakultas' => $model->id_fakultas], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id_fakultas' => $model->id_fakultas], [
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
                'attribute' => 'id_fakultas',
                'label' => 'Kode Fakultas',
            ],
            [
                'attribute' => 'id_univ',
                'value' => $model->univ->nama_lembaga,
                'label' => 'Nama Universitas',
            ],
            'nama_fakultas',
            'singkatan',
        ],
    ]) ?>

</div>