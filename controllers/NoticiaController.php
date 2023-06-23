<?php

namespace app\controllers;

use app\models\Noticia;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NoticiaController implements the CRUD actions for Noticia model.
 */
class NoticiaController extends Controller
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
     * Lists all Noticia models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Noticia::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idnoticia' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Noticia model.
     * @param int $idnoticia Idnoticia
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idnoticia)
    {
        return $this->render('view', [
            'model' => $this->findModel($idnoticia),
        ]);
    }







    /**
     * Creates a new Noticia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Noticia();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idnoticia' => $model->idnoticia]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }










    /**
     * Updates an existing Noticia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idnoticia Idnoticia
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idnoticia)
    {
        $model = $this->findModel($idnoticia);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idnoticia' => $model->idnoticia]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }







    /**
     * Deletes an existing Noticia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idnoticia Idnoticia
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idnoticia)
    {
        $this->findModel($idnoticia)->delete();

        return $this->redirect(['index']);
    }






    /**
     * Finds the Noticia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idnoticia Idnoticia
     * @return Noticia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idnoticia)
    {
        if (($model = Noticia::findOne(['idnoticia' => $idnoticia])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
