<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Ator;
use app\models\AtorFilme;
use yii\data\ActiveDataProvider;

class Ator_filmeController extends Controller
{
    /**
		*cria um vínculo entre ator e filme
		*Exemplo: Gal Gadot interpretou a Princesa Diana em "Mulher Maravilha"
    */
    public function actionCreate(){
    	$paramsPOST = Yii::$app->request->post();
        $nome_ator = $paramsPOST['ator']['nome'];
        $filme_id = $paramsPOST['ator']['filme_id'];
        $nome_ator = ucwords($nome_ator);
        $existe_ator = Ator::find()->where(['nome' => $nome_ator])->one();
        $atorFilmeObj = new AtorFilme();
        if($existe_ator == null){
            $atorObj = new Ator();
            $atorObj->nome = $nome_ator;
            $atorObj->save();
            $ator_id = $atorObj->id;
        }else{
            $ator_id = $existe_ator->id;
        }
        $existe_vinculo = $atorFilmeObj->consulta($filme_id,$ator_id);
        if($existe_vinculo == null){
            $atorFilmeObj->filme_id = $filme_id;
            $atorFilmeObj->ator_id = $ator_id;
            $atorFilmeObj->personagem = $paramsPOST['ator']['personagem'];
            $atorFilmeObj->save();
        }
        $listaAtores = $atorFilmeObj->listaAtores($filme_id,1);
        echo json_encode($listaAtores,JSON_UNESCAPED_UNICODE);
    }
    /**
        *realiza a exclusão de vínculo entre ator e filme
        *Exemplo: Gal Gadot não interpretou a Supergirl em "Mulher Maravilha"
        *Com isso, o registro será excluído
    */
    public function actionDelete(){
       $filme_id = Yii::$app->request->post('filme_id');
       $ator_id = Yii::$app->request->post('ator_id');
       $registro = AtorFilme::find()->where(['filme_id' => $filme_id])->andWhere(['ator_id' => $ator_id])->one();
       $registro->delete();
       echo "ok";
    }
}
