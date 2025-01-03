<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\KategoriAkreditas $model */

$this->title = 'Ubah Kategori Akreditas: ' . $model->id_kategori;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Akreditas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kategori, 'url' => ['view', 'id_kategori' => $model->id_kategori]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kategori-akreditas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>