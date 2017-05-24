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
		$objeto->loja_id = $paramsPOST['loja_id'];
		$objeto->subcategoria_id = $paramsPOST['subcategoria_id'];
		$salvou = $objeto->save();
		echo $salvou;
	}
}
