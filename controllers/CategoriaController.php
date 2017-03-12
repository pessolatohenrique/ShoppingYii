<?php

namespace app\controllers;

use Yii;
use app\models\Categoria;
use app\models\Area;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\session;

/**
 * CategoriaController implements the CRUD actions for Categoria model.
 */
class CategoriaController extends Controller
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
    public function actionIndex($area_id = null)
    {
       $categoriaObj = new Categoria();
       $parametros = array("area_id" => $area_id);
       $categorias = $categoriaObj->lista($parametros);
        return $this->render('index', [
            'categorias' => $categorias
        ]);
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionCreate()
    {
        $model = new Categoria();
        $areaObj = new Area();
        $areas = $areaObj->lista();
        $dados = array("model" => $model,"areas" => $areas);
        $dadosPOST = Yii::$app->request->post();
        if ($model->load(Yii::$app->request->post())) {
            $model->nome = $dadosPOST['Categoria']['nome'];
            $model->area_id = $dadosPOST['area_id'];
            $model->save();
            //redirecionamento com mensagem
            return $this->redirect(['index']);
        } else {
            return $this->render('create', $dados);
        }
    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $areaObj = new Area();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'areas' => $areaObj->lista()
            ]);
        }
    }
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    public function actionExclui(){
       $categoria_id = Yii::$app->request->post('categoria_id');
       $this->findModel($categoria_id)->delete();
       return $this->redirect(['index']);
    }
    protected function findModel($id)
    {
        if (($model = Categoria::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
