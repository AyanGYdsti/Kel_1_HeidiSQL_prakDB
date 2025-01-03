<?php

use app\models\Prodi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\ProdiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Prodi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prodi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Prodi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_prodi',
                'label' => 'Nama Prodi',
            ],
            [
                'attribute' => 'id_fakultas',
                'value' => 'fakultas.nama_fakultas',
                'label' => 'Nama Fakultas',
            ],
            'nama_prodi',
            'jenjang',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Prodi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_prodi' => $model->id_prodi]);
                }
            ],
        ],
    ]); ?>


</div>