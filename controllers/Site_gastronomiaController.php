<?php
namespace app\controllers;
use app\models\Categoria;
use app\models\Gastronomia;
use app\models\CardapioItem;
class Site_gastronomiaController extends \yii\web\Controller
{
	public $layout = "usuarioFinal.php";
    public function actionIndex()
    {
    	$categoriaObj = new Categoria();
    	$gastronomiaObj = new Gastronomia();
 		$dados = array(
 			"categorias" => $categoriaObj->listaRelGastronomia(),
 			"lojas" => $gastronomiaObj->lista(array())
 		);
        return $this->render('index',$dados);
    }
    public function actionSearch($gastronomia_id){
        $cardapioItemObj = new CardapioItem();
        $tipos_cardapio = $cardapioItemObj->listaTiposCardapio($gastronomia_id);
        $itensGeral = $cardapioItemObj->lista($gastronomia_id);
        $gastronomiaObj = new Gastronomia();
        $gastronomia_consulta = $gastronomiaObj->consulta($gastronomia_id);
        $semelhantes = $gastronomiaObj->listaSemelhantes($gastronomia_consulta,3);
    	return $this->render('search',[
            'model' => $gastronomia_consulta,
            'tipos_cardapio' => $tipos_cardapio,
            'tipos_todos' => $cardapioItemObj->listAllTiposCardapio(),
            'itens' => $itensGeral,
            'semelhantes' => $semelhantes
        ]);
    }
}
