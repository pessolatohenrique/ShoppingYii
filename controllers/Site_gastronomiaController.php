<?php
namespace app\controllers;
use app\models\Categoria;
use app\models\Gastronomia;
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
}
