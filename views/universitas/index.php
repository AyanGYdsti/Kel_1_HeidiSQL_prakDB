<?php

use app\models\Universitas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\UniversitasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Universitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="universitas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Universitas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_univ',
                'label' => 'Kode Lembaga',
            ],
            'nama_lembaga',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Universitas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_univ' => $model->id_univ]);
                }
            ],
        ],
    ]); ?>


</div>