<?php

namespace app\controllers;

use Yii;
use app\models\QuadroHorario;
use app\models\Sala;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Quadro_horarioController implements the CRUD actions for QuadroHorario model.
 */
class Quadro_horarioController extends Controller
{
    /**
     * @inheritdoc
     */
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
     * Lists all QuadroHorario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $quadroObj = new QuadroHorario();
        $dias_semana = $quadroObj->listaAgenda(7);
        $tamanho = count($dias_semana);
        $tamanho--;
        // $fields = ['filme_id','sala_id','data_exibicao','dia_semana','horario','flag3D','flagXD','idioma',
        //                 'DATEDIFF(data_exibicao,NOW()) AS dias_estreia'];
        $fields = ['filme_id'];
        $filmes_semana = $quadroObj->listaFilmes($fields,7);
        $array_filmes = array();
        foreach($filmes_semana as $key => $val){
            $fields_salas = ['quad.sala_id','sal.nome AS sala_nome'];
            $fields_horarios = ['quad.data_exibicao','quad.dia_semana','quad.horario','quad.sala_id','quad.flag3D','quad.flagXD','quad.idioma'];
            $salas_filme = $quadroObj->listaSalas($fields_salas,$val->filme_id);
            foreach($salas_filme as $key_sala => $val_sala){
                $horarios_filme = $quadroObj->listaHorarios($fields_horarios,$val->filme_id,$val_sala['sala_id']);
                array_push($salas_filme[$key_sala], $horarios_filme);
            }
            $array_temp = array(
                'filme_id' => $val->filme_id,
                'titulo' => $val->filme->titulo,
                'sinopse' => $val->filme->sinopse,
                'salas' => $salas_filme
            );
            array_push($array_filmes, $array_temp);
        }
        return $this->render('index', [
            'dias_semana' => $dias_semana,
            'primeira_data' => $dias_semana[$tamanho],
            'filmes' => $array_filmes
        ]);
    }

    /**
     * Displays a single QuadroHorario model.
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
     * Creates a new QuadroHorario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new QuadroHorario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing QuadroHorario model.
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
     * Deletes an existing QuadroHorario model.
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
     * Finds the QuadroHorario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return QuadroHorario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = QuadroHorario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
