<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LembagaAkreditas $model */

$this->title = 'Tambah Lembaga Akreditas';
$this->params['breadcrumbs'][] = ['label' => 'Lembaga Akreditas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lembaga-akreditas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>