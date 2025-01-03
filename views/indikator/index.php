<?php

use app\models\Indikator;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\IndikatorSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Indikator Akreditasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indikator-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Indikator', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_indikator',
                'label' => 'Kode Indikator Akreditasi',
            ],
            [
                'attribute' => 'id_indikator',
                'value' => 'elemen.nama_elemen',
                'label' => 'Nama Elemen',
            ],
            'nama_indikator:ntext',
            'no_urut',
            'aktif',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Indikator $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_indikator' => $model->id_indikator]);
                }
            ],
        ],
    ]); ?>


</div>