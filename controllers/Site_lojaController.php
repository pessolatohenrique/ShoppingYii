<?php
namespace app\controllers;
use app\models\Loja;
use app\models\Foto;
use app\models\Categoria;
use app\models\CategoriaProdutos;
use app\models\SubCategoriaProduto;
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
    public function actionSearch($loja_id){
        $lojaObj = new Loja();
        $categoriaObj = new CategoriaProdutos();
        $subcategoriaObj = new SubCategoriaProduto();
        $loja_consulta = $lojaObj->consulta($loja_id);
        $semelhantes = $lojaObj->listaSemelhantes($loja_consulta,3);
        return $this->render('search',[
            'model' => $loja_consulta,
            'semelhantes' => $semelhantes,
            'categorias_salvas' => $categoriaObj->listaRelLoja($loja_id),
            'subcategorias' => $subcategoriaObj->lista($loja_id)
        ]);
    }
}
