<?php

namespace app\controllers;

use Yii;
use app\models\Loja;
use app\models\Foto;
use app\models\Categoria;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LojaController implements the CRUD actions for Lojas model.
 */
class LojaController extends Controller
{
    public $layout = "padraoYii";
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Lojas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $lojaObj = new Loja();
        return $this->render('index', [
            'lojas' => $lojaObj->lista(),
        ]);
    }

    /**
     * Displays a single Lojas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Lojas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Loja();
        $model_foto = new Foto();
        $categoriaObj = new Categoria();
        $paramsFiltro = array('area_id' => 1);
        $categorias = $categoriaObj->lista($paramsFiltro);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model_foto->salvaFoto($model);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'model_foto' => $model_foto,
                'categorias' => $categoriaObj->lista($paramsFiltro)
            ]);
        }
    }

    /**
     * Updates an existing Lojas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Lojas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Lojas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lojas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lojas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
