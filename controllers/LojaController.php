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
        $request = Yii::$app->request;
        $paramsPOST = $request->post();
        $lojaObj = new Loja();
        $categoriaObj = new Categoria();
        return $this->render('index', [
            'lojas' => $lojaObj->lista($paramsPOST),
            'categorias' => $categoriaObj->listaRelLoja()
        ]);
    }

    /**
     * Displays a single Lojas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $lojaObj = new Loja();
        return $this->render('view', [
            'model' => $lojaObj->consulta($id),
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
        $model_foto = new Foto();
        $categoriaObj = new Categoria();
        $lojaObj = new Loja();
        $paramsFiltro = Array('area_id' => 1);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model_foto->salvaFoto($model);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'model_foto' => $model_foto,
                'categorias' => $categoriaObj->lista($paramsFiltro),
                'pesquisa' => $lojaObj->consulta($id)
            ]);
        }
    }

    public function actionExclui(){
       $loja_id = Yii::$app->request->post('loja_id');
       $this->findModel($loja_id)->delete();
       return $this->redirect(['index']);
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
        if (($model = Loja::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
