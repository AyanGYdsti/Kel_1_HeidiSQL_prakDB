<?php

use app\models\Elemen;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\ElemenSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Elemen Akreditasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="elemen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Elemen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_elemen',
                'label' => 'Kode Elemen Akreditasi',
            ],
            'nama_elemen',
            'deskripsi:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Elemen $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_elemen' => $model->id_elemen]);
                }
            ],
        ],
    ]); ?>


</div>