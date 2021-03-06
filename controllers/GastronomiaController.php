<?php

namespace app\controllers;

use Yii;
use app\models\Gastronomia;
use app\models\Categoria;
use app\models\Foto;
use app\models\CardapioItem;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Representa o controller de lojas de Gastronomia
 */
class GastronomiaController extends Controller
{
    /**
     * @inheritdoc
     */
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
     * Lists all Gastronomia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $gastronomiaObj = new Gastronomia();
        $categoriaObj = new Categoria();
        $paramsGET = $request->get();
        $lojas_gastronomia = $gastronomiaObj->lista($paramsGET);
        return $this->render('index', [
            'categorias' => $categoriaObj->listaRelGastronomia(),
            'lojas_gastronomia' => $lojas_gastronomia,
        ]);
    }

    /**
     * Displays a single Gastronomia model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $cardapioItemObj = new CardapioItem();
        $tipos_cardapio = $cardapioItemObj->listaTiposCardapio($id);
        $itensGeral = $cardapioItemObj->lista($id);
        $gastronomiaObj = new Gastronomia();
        return $this->render('view', [
            'model' => $gastronomiaObj->consulta($id),
            'tipos_cardapio' => $tipos_cardapio,
            'tipos_todos' => $cardapioItemObj->listAllTiposCardapio(),
            'itens' => $itensGeral
        ]);
    }

    /**
     * Creates a new Gastronomia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gastronomia();
        $model_foto = new Foto();
        $categoriaObj = new Categoria();
        $paramsFiltro = Array('area_id' => 2);
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
     * Updates an existing Gastronomia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_foto = new Foto();
        $categoriaObj = new Categoria();
        $gastronomiaObj = new Gastronomia();
        $paramsFiltro = Array('area_id' => 2);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model_foto->salvaFoto($model);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'model_foto' => $model_foto,
                'categorias' => $categoriaObj->lista($paramsFiltro),
                'pesquisa' => $gastronomiaObj->consulta($id)
            ]);
        }
    }

    /**
     * Deletes an existing Gastronomia model.
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
     * Deletes an existing Gastronomia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionExclui(){
       $gastronomia_id = Yii::$app->request->post('gastronomia_id');
       $this->findModel($gastronomia_id)->delete();
       return $this->redirect(['index']);
    }
    /**
     * Finds the Gastronomia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gastronomia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gastronomia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /*adiciona um tipo de gastronomia a uma loja gastronomica. Exemplo:
        a loja Amor aos pedaços possui os tipos Doces, salgados e bebidas*/
    public function actionAdiciona_tipo_gastronomia(){
        $cardapioObj = new CardapioItem();
        $paramsPOST = Yii::$app->request->post();
        $cardapioObj->adicionaTipoGastronomia($paramsPOST);
    }
    /*adiciona um item no tipo de gastronomia. Exemplo:
        um brigadeiro no tipo Doce; um café no tipo bebidas*/
    public function actionAdiciona_item(){
        $itemObj = new CardapioItem();
        $paramsPOST = Yii::$app->request->post();
        $itemObj->adicionaItem($paramsPOST);
    }
    /*busca as lojas por uma determinada categoria e retorna um arquivo JSON*/
    public function actionBusca_por_categoria($categoria_id){
        $gastronomiaObj = new Gastronomia();
        $params = array("categoria" => $categoria_id);
        $lojas = $gastronomiaObj->lista($params);
        $arquivo_json = json_encode($lojas,JSON_UNESCAPED_UNICODE);
        echo $arquivo_json;
    }
    /*busca as lojas pelo nome (estilo LIKE) e retornau um arquivo JSON*/
    public function actionBusca_por_nome($loja){
        $gastronomiaObj = new Gastronomia();
        $params = array("loja" => $loja);
        $lojas = $gastronomiaObj->lista($params);
        $arquivo_json = json_encode($lojas,JSON_UNESCAPED_UNICODE);
        echo $arquivo_json;
    }
}
