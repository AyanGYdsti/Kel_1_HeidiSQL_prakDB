<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Universitas $model */

$this->title = 'Ubah Universitas: ' . $model->id_univ;
$this->params['breadcrumbs'][] = ['label' => 'Universitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_univ, 'url' => ['view', 'id_univ' => $model->id_univ]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="universitas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>