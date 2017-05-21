<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\LojaCategoriaProdutos;
use app\models\CategoriaProdutos;

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
}
