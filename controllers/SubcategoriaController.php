<?php

namespace app\controllers;
use Yii;
use app\models\SubCategoriaProduto;
use app\models\LojasSubcategoriaProdutos;
class SubcategoriaController extends \yii\web\Controller
{
	public function actionLista(){
		$paramsGET = Yii::$app->request->get();
		$categoria_id = $paramsGET['categoria_id'];
		$objeto = new SubCategoriaProduto();
		$subcategorias = $objeto->listaRelCategoria($categoria_id);
		$subcategorias_json = json_encode($subcategorias);
		echo $subcategorias_json;
	}
	public function actionCreate(){
		$paramsPOST = Yii::$app->request->post();
		$loja_id = $paramsPOST['loja_id'];
		$subcategoria_id = $paramsPOST['subcategoria_id'];
		$objeto = new LojasSubcategoriaProdutos();
		$flagExiste = $objeto->consultaVinculo($loja_id,$subcategoria_id);
		if($flagExiste != NULL){
			echo "999";
		}else{		
			$objeto->loja_id = $paramsPOST['loja_id'];
			$objeto->subcategoria_id = $paramsPOST['subcategoria_id'];
			$salvou = $objeto->save();
			echo $salvou;
		}
	}
	public function actionAdiciona(){
		$paramsPOST = Yii::$app->request->post();
		$categoria_id = $paramsPOST['categoria_id'];
		$subcategoria_nome = $paramsPOST['nome'];
		$subObj = new SubCategoriaProduto();
		$flagExiste = $subObj->consultaPorNome($categoria_id,$subcategoria_nome);
		if($flagExiste == false){
			$subObj->categoria_id = $paramsPOST['categoria_id'];
			$subObj->nome = $paramsPOST['nome'];
			$subObj->save();
		}else{
			echo "999";
		}
	}
    public function actionDelete(){
        $paramsPOST = Yii::$app->request->post();
        $loja_id = $paramsPOST['loja_id'];
        $subcategoria_id = $paramsPOST['subcategoria_id'];
        $vinculo = LojasSubcategoriaProdutos::find()->where(['loja_id' => $loja_id])
        ->andWhere(['subcategoria_id' => $subcategoria_id])->one();
        $vinculo->delete();
    }
}
