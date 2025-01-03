<?php

namespace app\controllers;

use app\models\Fakultas;
use app\models\search\FakultasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FakultasController implements the CRUD actions for Fakultas model.
 */
class FakultasController extends Controller
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
     * Lists all Fakultas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FakultasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fakultas model.
     * @param int $id_fakultas Id Fakultas
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_fakultas)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_fakultas),
        ]);
    }

    /**
     * Creates a new Fakultas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Fakultas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_fakultas' => $model->id_fakultas]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Fakultas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_fakultas Id Fakultas
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_fakultas)
    {
        $model = $this->findModel($id_fakultas);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_fakultas' => $model->id_fakultas]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Fakultas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_fakultas Id Fakultas
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_fakultas)
    {
        $this->findModel($id_fakultas)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fakultas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_fakultas Id Fakultas
     * @return Fakultas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_fakultas)
    {
        if (($model = Fakultas::findOne(['id_fakultas' => $id_fakultas])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
