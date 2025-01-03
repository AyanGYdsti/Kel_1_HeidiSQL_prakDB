<?php

use app\models\KategoriAkreditas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\KategoriAkreditasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Kategori Akreditas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-akreditas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Kategori Akreditasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_kategori',
                'label' => 'Kode Kategori Akreditasi',
            ],
            'deskripsi',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, KategoriAkreditas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_kategori' => $model->id_kategori]);
                }
            ],
        ],
    ]); ?>


</div>