<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\LojaCategoriaProdutos;
use app\models\CategoriaProdutos;
use yii\data\ActiveDataProvider;

class Categoria_produtoController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    /**
		*cria um vínculo entre loja e categoriaProduto
		*exemplo: a loja Saraiva terá a categoria "Livros"
    */
    public function actionVincula_categoria(){
		$paramsPOST = Yii::$app->request->post();
		$vinculoObj = new LojaCategoriaProdutos();
		$vinculoObj->loja_id = $paramsPOST['loja_id'];
		$vinculoObj->categoria_id = $paramsPOST['categoria_id'];
		$vinculoObj->save();
    }
    /**
		*adiciona uma nova categoria de um produto
		*Exemplo: "Eletrodoméstico"
		*Essa categoria será, conforme uso do site, vinculada a uma loja
    */
    public function actionCreate(){
    	$paramsPOST = Yii::$app->request->post();
    	$categoriaObj = new CategoriaProdutos();
    	$categoriaObj->nome = $paramsPOST['categoria_nome'];
    	$categoria_adicionada = $categoriaObj->save();
    	echo $categoriaObj->id;
    }
    /**
    exclui o vínculo entre loja e categoria.
    *Exemplo: a loja Saraiva não venderá mais a categoria "Papelaria"
    */
    public function actionDelete(){
        $paramsPOST = Yii::$app->request->post();
        $loja_id = $paramsPOST['loja_id'];
        $categoria_id = $paramsPOST['categoria_id'];
        $vinculo = LojaCategoriaProdutos::find()->where(['loja_id' => $loja_id])
        ->andWhere(['categoria_id' => $categoria_id])->one();
        $vinculo->delete();
    }
}
