<?php

use app\models\LembagaAkreditas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\LembagaAkreditasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lembaga Akreditas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lembaga-akreditas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Lembaga Akreditas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_lembaga',
                'label' => 'Kode Lembaga Akreditasi',
            ],
            'nama_lembaga',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, LembagaAkreditas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_lembaga' => $model->id_lembaga]);
                }
            ],
        ],
    ]); ?>


</div>