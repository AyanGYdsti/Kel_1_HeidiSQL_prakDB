<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Prodi $model */

$this->title = $model->id_prodi;
$this->params['breadcrumbs'][] = ['label' => 'Prodi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="prodi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id_prodi' => $model->id_prodi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id_prodi' => $model->id_prodi], [
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
                'attribute' => 'id_prodi',
                'label' => 'Kode Prodi',
            ],
            [
                'attribute' => 'id_fakutlas',
                'value' => $model->fakultas->nama_fakultas,
                'label' => 'Nama Fakultas',
            ],
            'nama_prodi',
            'jenjang',
        ],
    ]) ?>

</div>