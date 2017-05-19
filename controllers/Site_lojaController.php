<?php
namespace app\controllers;
use app\models\Categoria;
use app\models\Loja;
class Site_lojaController extends \yii\web\Controller
{
	public $layout = "usuarioFinal.php";
    public function actionIndex()
    {
        $categoriaObj = new Categoria();
        $lojaObj = new Loja();
        return $this->render('index',[
            'categorias' => $categoriaObj->listaRelLoja(),
            'lojas' => $lojaObj->lista(array())
        ]);
    }
    public function actionSearch($gastronomia_id){

    }
}
