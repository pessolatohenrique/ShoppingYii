<?php

namespace app\controllers;
use Yii;
use app\models\Distribuidora;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
class DistribuidoraController extends Controller
{
    public function actionCreate()
    {
        $paramsPOST = Yii::$app->request->post();
        $descricao = $paramsPOST['descricao'];
        $descricao = ucfirst($descricao);
        $existe_estudio = $customer = Distribuidora::find()
        ->where(['nome' => $descricao])
        ->one();
        if($existe_estudio == null){
            $estudioObj = new Distribuidora();
            $estudioObj->nome = $descricao;
            $salvou = $estudioObj->save();
            echo $estudioObj->id;
        }else{
            echo "0";
        }
    }
}
