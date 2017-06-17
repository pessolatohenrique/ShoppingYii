<?php

namespace app\controllers;

use Yii;
use app\models\Foto;
use app\models\Filme;
use app\models\Genero;
use app\models\Distribuidora;
use app\models\Diretor;
use app\models\StatusExibicao;
use app\models\ClassificacaoIndicativa;
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
        $generoObj = new Genero();
        $estudioObj = new Distribuidora();
        $diretorObj = new Diretor();
        $statusObj = new StatusExibicao();
        $classificacaoObj = new ClassificacaoIndicativa();
        $fields = "clas.descricao AS classificacao,gen.descricao AS genero_nome,stu.descricao AS status_exibicao,est.nome AS estudio_nome, dir.nome AS diretor_nome,fi.id,fi.status_id,fi.genero_id,fi.distribuidora_id,fi.diretor_id,fi.classificacao_id,fi.titulo,fi.duracao";
        $filtros = array();
        if(Yii::$app->request->post()){
            $paramsPOST = Yii::$app->request->post();
            $filtros = $paramsPOST['Filme'];
        }
        return $this->render('index', [
            'filmes' => $filmeObj->lista($fields,$filtros),
            'generos' => $generoObj->listaRelFilmes(),
            'distribuidoras' => $estudioObj->listaRelFilmes(),
            'diretores' => $diretorObj->listaRelFilmes(),
            'status_exibicao' => $statusObj->listaRelFilmes(),
            'classificacoes' => $classificacaoObj->listaRelFilmes()
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
        $model_foto = new Foto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $arquivo = $model_foto->salvaFotoFilme($model);
            return $this->redirect(['index']);
        } else {
            
            return $this->render('create', [
                'model' => $model,
                'model_foto' => $model_foto,
                'generos' => Genero::find()->orderBy('descricao')->all(),
                'estudios' => Distribuidora::find()->orderBy('nome')->all(),
                'diretores' => Diretor::find()->orderBy('nome')->all(),
                'status' => StatusExibicao::find()->orderBy('id')->all(),
                'classificacoes' => ClassificacaoIndicativa::find()->orderBy('id')->all()
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
