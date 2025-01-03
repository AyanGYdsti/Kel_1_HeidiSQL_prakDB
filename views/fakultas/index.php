<?php

use app\models\Fakultas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\FakultasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fakultas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fakultas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Fakultas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_fakultas',
                'label' => 'Nama Lembaga', // Mengubah label kolom
            ],
            [
                'attribute' => 'id_univ',
                'value' => 'univ.nama_lembaga', // Menggunakan relasi untuk menampilkan nama_lembaga
                'label' => 'Nama Lembaga', // Mengubah label kolom
            ],
            'nama_fakultas',
            'singkatan',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Fakultas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_fakultas' => $model->id_fakultas]);
                }
            ],
        ],
    ]); ?>


</div>