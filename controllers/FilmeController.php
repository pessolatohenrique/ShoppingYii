<?php

namespace app\controllers;

use Yii;
use app\models\Filme;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FilmeController implements the CRUD actions for Filme model.
 */
class FilmeController extends Controller
{
    public $layout = "padraoYii";
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Filme models.
     * @return mixed
     */
    public function actionIndex()
    {
        $filmeObj = new Filme();
        /*'id' => string '1' (length=1)
      'status_id' => string '1' (length=1)
      'genero_id' => string '2' (length=1)
      'distribuidora_id' => string '4' (length=1)
      'diretor_id' => string '5' (length=1)
      'classificacao_id' => string '3' (length=1)
      'titulo' => string 'Mulher Maravilha' (length=16)
      'duracao' => string '140' (length=3)
      'sinopse' => string 'Princesa e Embaixadora das Amazonas da Ilha Paraíso, ela foi mandada ao “mundo dos homens” para propagar a paz, sendo a defensora da verdade e da vida na luta entre os homens e o firmamento, entre os mortais e */
        $fields = "clas.descricao AS classificacao,gen.descricao AS genero_nome,stu.descricao AS status_exibicao,est.nome AS estudio_nome, dir.nome AS diretor_nome,fi.id,fi.status_id,fi.genero_id,fi.distribuidora_id,fi.diretor_id,fi.classificacao_id,fi.titulo,fi.duracao";
        return $this->render('index', [
            'filmes' => $filmeObj->lista($fields)
        ]);
    }

    /**
     * Displays a single Filme model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Filme model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Filme();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Filme model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Filme model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Filme model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Filme the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Filme::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
