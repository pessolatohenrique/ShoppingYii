<?php

namespace app\controllers;
use Yii;
use app\models\Genero;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
class GeneroController extends Controller
{
    public function actionCreate()
    {
        $paramsPOST = Yii::$app->request->post();
        $descricao = $paramsPOST['descricao'];
        $descricao = ucfirst($descricao);
        $existe_genero = $customer = Genero::find()
        ->where(['descricao' => $descricao])
        ->one();
        if($existe_genero == null){
            $generoObj = new Genero();
            $generoObj->descricao = $descricao;
            $salvou = $generoObj->save();
            echo $generoObj->id;
        }else{
            echo "0";
        }
    }
}
