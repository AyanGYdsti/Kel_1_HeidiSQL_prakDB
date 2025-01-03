<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PenilaianProdi $model */

$this->title = 'Tambah Penilaian Akreditasi Prodi';
$this->params['breadcrumbs'][] = ['label' => 'Penilaian Akreditasi Prodi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penilaian-prodi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>