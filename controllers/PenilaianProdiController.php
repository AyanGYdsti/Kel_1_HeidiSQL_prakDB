<?php

namespace app\controllers;

use app\models\Elemen;
use app\models\PenilaianProdi;
use app\models\Prodi;
use app\models\search\PenilaianProdiSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PenilaianProdiController implements the CRUD actions for PenilaianProdi model.
 */
class PenilaianProdiController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all PenilaianProdi models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PenilaianProdiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Ambil filter prodi dan tahun dari request
        $idProdi = Yii::$app->request->get('id_prodi');
        $tahun = Yii::$app->request->get('tahun');

        // Filter data berdasarkan prodi dan tahun
        if ($idProdi && $tahun) {
            $dataProvider->query->andWhere(['id_prodi' => $idProdi, 'tahun' => $tahun]);
        }

        // Ambil daftar prodi untuk dropdown
        $prodi = Prodi::find()->all();

        $model = Elemen::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'prodi' => $prodi,
            'idProdi' => $idProdi,
            'tahun' => $tahun,
            'model' => $model,
        ]);
    }


    /**
     * Displays a single PenilaianProdi model.
     * @param string $tahun Tahun
     * @param int $id_indikator Id Indikator
     * @param int $id_prodi Id Prodi
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($tahun, $id_indikator, $id_prodi)
    {
        return $this->render('view', [
            'model' => $this->findModel($tahun, $id_indikator, $id_prodi),
        ]);
    }

    /**
     * Creates a new PenilaianProdi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PenilaianProdi();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'tahun' => $model->tahun, 'id_indikator' => $model->id_indikator, 'id_prodi' => $model->id_prodi]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PenilaianProdi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $tahun Tahun
     * @param int $id_indikator Id Indikator
     * @param int $id_prodi Id Prodi
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($tahun, $id_indikator, $id_prodi)
    {
        $model = $this->findModel($tahun, $id_indikator, $id_prodi);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'tahun' => $model->tahun, 'id_indikator' => $model->id_indikator, 'id_prodi' => $model->id_prodi]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PenilaianProdi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $tahun Tahun
     * @param int $id_indikator Id Indikator
     * @param int $id_prodi Id Prodi
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($tahun, $id_indikator, $id_prodi)
    {
        $this->findModel($tahun, $id_indikator, $id_prodi)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PenilaianProdi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $tahun Tahun
     * @param int $id_indikator Id Indikator
     * @param int $id_prodi Id Prodi
     * @return PenilaianProdi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($tahun, $id_indikator, $id_prodi)
    {
        if (($model = PenilaianProdi::findOne(['tahun' => $tahun, 'id_indikator' => $id_indikator, 'id_prodi' => $id_prodi])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSimpan()
    {
        $request = Yii::$app->request;

        if ($request->isPost) {
            $idProdi = $request->post('id_prodi');
            $tahun = $request->post('tahun');
            $indikatorData = $request->post('indikator', []);
            $nilaiData = $request->post('nilai', []);

            // Validasi awal untuk memastikan semua data yang diperlukan tersedia
            if (empty($idProdi) || empty($tahun)) {
                Yii::$app->session->setFlash('error', 'Prodi dan Tahun harus diisi.');
                return $this->redirect(['index']);
            }

            if (empty($indikatorData) || empty($nilaiData)) {
                Yii::$app->session->setFlash('error', 'Data indikator dan nilai harus diisi.');
                return $this->redirect(['index']);
            }

            // Loop melalui data indikator dan nilai untuk menyimpan atau memperbarui ke database
            foreach ($indikatorData as $idIndikator) {
                // Pastikan nilai terkait indikator ada
                $nilai = $nilaiData[$idIndikator] ?? null;

                if ($nilai !== null) {
                    // Periksa apakah data sudah ada
                    $model = PenilaianProdi::findOne([
                        'id_prodi' => $idProdi,
                        'tahun' => $tahun,
                        'id_indikator' => $idIndikator,
                    ]);

                    if ($model === null) {
                        // Jika data belum ada, buat instance baru
                        $model = new PenilaianProdi();
                        $model->id_prodi = $idProdi;
                        $model->tahun = $tahun;
                        $model->id_indikator = $idIndikator;
                    }

                    // Update nilai (baik untuk data baru maupun yang sudah ada)
                    $model->nilai = $nilai;

                    if (!$model->save()) {
                        Yii::$app->session->setFlash('error', 'Gagal menyimpan data untuk indikator ID: ' . $idIndikator);
                        return $this->redirect(['index']);
                    }
                }
            }

            Yii::$app->session->setFlash('success', 'Data berhasil disimpan.');
            return $this->redirect(['index']);
        }

        return $this->redirect(['index']);
    }
}
