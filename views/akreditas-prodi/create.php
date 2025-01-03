<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AkreditasProdi $model */

$this->title = 'Tambah Riwayat Akreditasi';
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Akreditasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="akreditas-prodi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>