<?php

namespace app\controllers;

use app\models\Universitas;
use app\models\search\UniversitasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UniversitasController implements the CRUD actions for Universitas model.
 */
class UniversitasController extends Controller
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
     * Lists all Universitas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UniversitasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Universitas model.
     * @param int $id_univ Id Univ
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_univ)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_univ),
        ]);
    }

    /**
     * Creates a new Universitas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Universitas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_univ' => $model->id_univ]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Universitas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_univ Id Univ
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_univ)
    {
        $model = $this->findModel($id_univ);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_univ' => $model->id_univ]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Universitas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_univ Id Univ
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_univ)
    {
        $this->findModel($id_univ)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Universitas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_univ Id Univ
     * @return Universitas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_univ)
    {
        if (($model = Universitas::findOne(['id_univ' => $id_univ])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
