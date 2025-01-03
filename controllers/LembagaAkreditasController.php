<?php

namespace app\controllers;

use app\models\LembagaAkreditas;
use app\models\search\LembagaAkreditasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LembagaAkreditasController implements the CRUD actions for LembagaAkreditas model.
 */
class LembagaAkreditasController extends Controller
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
     * Lists all LembagaAkreditas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LembagaAkreditasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LembagaAkreditas model.
     * @param int $id_lembaga Id Lembaga
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_lembaga)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_lembaga),
        ]);
    }

    /**
     * Creates a new LembagaAkreditas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new LembagaAkreditas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_lembaga' => $model->id_lembaga]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LembagaAkreditas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_lembaga Id Lembaga
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_lembaga)
    {
        $model = $this->findModel($id_lembaga);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_lembaga' => $model->id_lembaga]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LembagaAkreditas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_lembaga Id Lembaga
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_lembaga)
    {
        $this->findModel($id_lembaga)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LembagaAkreditas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_lembaga Id Lembaga
     * @return LembagaAkreditas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_lembaga)
    {
        if (($model = LembagaAkreditas::findOne(['id_lembaga' => $id_lembaga])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
