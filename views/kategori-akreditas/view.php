<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\KategoriAkreditas $model */

$this->title = $model->id_kategori;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Akreditas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kategori-akreditas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id_kategori' => $model->id_kategori], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id_kategori' => $model->id_kategori], [
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
                'attribute' => 'id_kategori',
                'label' => 'Kode Kategori Akreditasi',
            ],
            [
                'attribute' => 'deskripsi',
                'label' => 'Deskripsi Akreditasi',
            ],
        ],
    ]) ?>

</div>