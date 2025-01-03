<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\KategoriAkreditas $model */

$this->title = 'Tambah Kategori Akreditas';
$this->params['breadcrumbs'][] = ['label' => 'Kategori Akreditasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-akreditas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>