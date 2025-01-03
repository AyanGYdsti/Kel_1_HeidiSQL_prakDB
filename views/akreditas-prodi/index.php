<?php

use app\models\AkreditasProdi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\AkreditasProdiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Riwayat Akreditasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="akreditas-prodi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Riwayat Akreditasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_akreditas',
            [
                'attribute' => 'id_prodi',
                'value' => 'prodi.nama_prodi',
            ],
            [
                'attribute' => 'id_kategori',
                'value' => 'kategori.deskripsi',
            ],
            [
                'attribute' => 'id_lembaga',
                'value' => 'lembaga.nama_lembaga',
            ],
            'tanggal_mulai',
            'tanggal_akhir',
            'no_sk',
            'lembaga_akreditas',
            'file',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AkreditasProdi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_akreditas' => $model->id_akreditas]);
                }
            ],
        ],
    ]); ?>


</div>