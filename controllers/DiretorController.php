<?php

namespace app\controllers;
use Yii;
use app\models\Diretor;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
class DiretorController extends Controller
{
    public function actionCreate()
    {
        $paramsPOST = Yii::$app->request->post();
        $nome = $paramsPOST['nome'];
        $nome = ucfirst($nome);
        $existe_diretor = $customer = Diretor::find()
        ->where(['nome' => $nome])
        ->one();
        if($existe_diretor == null){
            $diretorObj = new Diretor();
            $diretorObj->nome = $nome;
            $salvou = $diretorObj->save();
            echo $diretorObj->id;
        }else{
            echo "0";
        }
    }
}
