<?php

use app\models\PenilaianProdi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\PenilaianProdiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Penilaian Akreditasi Prodi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penilaian-prodi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>
    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['index'],
    ]); ?>

    <div class="form-group">
        <label for="prodi">Prodi</label>
        <select class="form-select" name="id_prodi" id="prodi">
            <option value="">Pilih Prodi</option>
            <?php foreach ($prodi as $item): ?>
                <option value="<?= $item->id_prodi ?>" <?= $item->id_prodi == $idProdi ? 'selected' : '' ?>>
                    <?= $item->nama_prodi ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="tahun">Tahun</label>
        <select name="tahun" id="tahun" class="form-control">
            <option value="">Pilih Tahun</option>
            <?php for ($year = 2020; $year <= 2050; $year++): ?>
                <option value="<?= $year ?>" <?= $year == $tahun ? 'selected' : '' ?>>
                    <?= $year ?>
                </option>
            <?php endfor; ?>
        </select>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Filter', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tahun',
            [
                'attribute' => 'id_prodi',
                'value' => 'prodi.nama_prodi',
            ],
            [
                'attribute' => 'id_indikator',
                'label' => 'Nama Elemen',
                'value' => 'indikator.elemen.nama_elemen'
            ],
            [
                'attribute' => 'id_indikator',
                'value' => 'indikator.nama_indikator',
            ],
            'nilai',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PenilaianProdi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'tahun' => $model->tahun, 'id_prodi' => $model->id_prodi, 'id_indikator' => $model->id_indikator]);
                }
            ],
        ],
    ]); ?>


    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="form-group">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-success', 'formaction' => Url::to(['penilaian-prodi/simpan'])]) ?>
            </div>

            <div class="form-group">
                <label for="prodi">Prodi</label>
                <select class="form-select" name="id_prodi" id="prodi">
                    <option value="">Pilih Prodi</option>
                    <?php foreach ($prodi as $item): ?>
                        <option value="<?= $item->id_prodi ?>"><?= $item->nama_prodi ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="tahun">Tahun</label>
                <select name="tahun" id="tahun" class="form-control">
                    <option value="">Pilih Tahun</option>
                    <?php for ($year = 2020; $year <= 2050; $year++): ?>
                        <option value="<?= $year ?>"><?= $year ?></option>
                    <?php endfor; ?>
                </select>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Elemen</th>
                        <th>Indikator</th>
                        <th style="width: 10%;">Penilaian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($model as $item):
                        $indikators = $item->indikators ?? [];
                        $rowspan = count($indikators) > 0 ? count($indikators) : 1;
                    ?>
                        <tr>
                            <td rowspan="<?= $rowspan ?>"><?= $no++ ?></td>
                            <td rowspan="<?= $rowspan ?>"><?= Html::encode($item->nama_elemen ?? 'Tidak Ada Data') ?></td>
                            <?php if (!empty($indikators)): ?>
                                <td><?= Html::encode($indikators[0]->nama_indikator ?? 'Tidak Ada Data') ?></td>
                                <td>
                                    <input type="hidden" name="indikator[<?= $indikators[0]->id_indikator ?>]" value="<?= $indikators[0]->id_indikator ?>">
                                    <input type="text" class="form-control" name="nilai[<?= $indikators[0]->id_indikator ?>]" placeholder="Nilai">
                                </td>
                            <?php else: ?>
                                <td>Tidak Ada Data</td>
                                <td>
                                    <input type="text" class="form-control" name="nilai[]" placeholder="Nilai" disabled>
                                </td>
                            <?php endif; ?>
                        </tr>
                        <?php if (!empty($indikators)): ?>
                            <?php for ($i = 1; $i < count($indikators); $i++): ?>
                                <tr>
                                    <td><?= Html::encode($indikators[$i]->nama_indikator ?? 'Tidak Ada Data') ?></td>
                                    <td>
                                        <input type="hidden" name="indikator[<?= $indikators[$i]->id_indikator ?>]" value="<?= $indikators[$i]->id_indikator ?>">
                                        <input type="text" class="form-control" name="nilai[<?= $indikators[$i]->id_indikator ?>]" placeholder="Nilai" required>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>


            </table>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>