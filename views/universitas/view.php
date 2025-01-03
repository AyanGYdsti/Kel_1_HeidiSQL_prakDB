<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Universitas $model */

$this->title = $model->id_univ;
$this->params['breadcrumbs'][] = ['label' => 'Universitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="universitas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id_univ' => $model->id_univ], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id_univ' => $model->id_univ], [
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
                'attribute' => 'id_univ',
                'label' => 'Kode Universitas',
            ],
            'nama_lembaga',
        ],
    ]) ?>

</div>