<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Elemen $model */

$this->title = $model->id_elemen;
$this->params['breadcrumbs'][] = ['label' => 'Elemens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="elemen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id_elemen' => $model->id_elemen], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id_elemen' => $model->id_elemen], [
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
                'attribute' => 'id_elemen',
                'label' => 'Kode Elemen Akreditasi',
            ],
            'nama_elemen',
            'deskripsi:ntext',
        ],
    ]) ?>

</div>