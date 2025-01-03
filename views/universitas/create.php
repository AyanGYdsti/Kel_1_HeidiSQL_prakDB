<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Universitas $model */

$this->title = 'Tambah Universitas';
$this->params['breadcrumbs'][] = ['label' => 'Universitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="universitas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
