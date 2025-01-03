<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LembagaAkreditas $model */

$this->title = 'Ubah Lembaga Akreditas: ' . $model->id_lembaga;
$this->params['breadcrumbs'][] = ['label' => 'Lembaga Akreditas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_lembaga, 'url' => ['view', 'id_lembaga' => $model->id_lembaga]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lembaga-akreditas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
