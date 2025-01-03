<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Elemen $model */

$this->title = 'Ubah Elemen: ' . $model->id_elemen;
$this->params['breadcrumbs'][] = ['label' => 'Elemen Akreditasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_elemen, 'url' => ['view', 'id_elemen' => $model->id_elemen]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="elemen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
