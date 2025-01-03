<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\LembagaAkreditas $model */

$this->title = $model->id_lembaga;
$this->params['breadcrumbs'][] = ['label' => 'Lembaga Akreditas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lembaga-akreditas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id_lembaga' => $model->id_lembaga], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id_lembaga' => $model->id_lembaga], [
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
                'attribute' => 'id_lembaga',
                'label' => 'Kode Lembaga',

            ],
            'nama_lembaga',
        ],
    ]) ?>

</div>