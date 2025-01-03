<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Indikator $model */

$this->title = 'Tambah Indikator Akreditasi';
$this->params['breadcrumbs'][] = ['label' => 'Indikator Akreditasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indikator-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>