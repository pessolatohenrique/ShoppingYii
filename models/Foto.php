<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use StringFormat;

/**
 * This is the model class for table "fotos".
 *
 * @property integer $id
 * @property integer $loja_id
 * @property string $nome_arquivo
 * @property string $descricao
 */
class Foto extends \yii\db\ActiveRecord
{
    public $arquivoFoto; //atributo para gerenciamento de arquivos 
    public static function tableName()
    {
        return 'fotos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loja_id'], 'integer'],
            [['descricao'], 'string'],
            [['nome_arquivo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'loja_id' => 'Loja ID',
            'nome_arquivo' => 'Foto de Divulgação',
            'descricao' => 'Descricao',
        ];
    }
    /*Retira os acentos de nomes*/
    public function retiraAcentos($string){
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }
    /*Realiza o upload e salva informações de foto para uma loja*/
    public function salvaFoto($lojaObj){
        $this->arquivoFoto = UploadedFile::getInstance($this,'nome_arquivo');
        $this->loja_id = $lojaObj->id;
        $this->nome_arquivo = $this->arquivoFoto->name;
        $this->descricao = "Foto principal da loja ".$lojaObj->nome_loja;
        $this->save();
        $uploadPath = Yii::getAlias('@webroot/arquivos');
        $this->arquivoFoto->saveAs($uploadPath.'/'.$this->arquivoFoto->name);
    }
    /*Realiza o upload e salva informações de foto para os filmes*/
    public function salvaFotoFilme($filmeObj){
        $this->arquivoFoto = UploadedFile::getInstance($this,'nome_arquivo');
        $nome_arquivo = $this->arquivoFoto->name;
        $nome_arquivo = $this->retiraAcentos($nome_arquivo);
        $nome_arquivo = html_entity_decode($nome_arquivo);
        $nome_arquivo = strtolower($nome_arquivo);
        $nome_arquivo = trim($nome_arquivo);
        $nome_arquivo = str_replace(" ", "", $nome_arquivo);
        $uploadPath = Yii::getAlias('@webroot/arquivos');
        $this->arquivoFoto->saveAs($uploadPath.'/'.$nome_arquivo);
        $filmeObj->arquivo = $nome_arquivo;
        $filmeObj->save();
    }
}