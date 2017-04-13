<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "cardapioitens".
 *
 * @property integer $id
 * @property integer $gastronomia_id
 * @property integer $cardapioTipo_id
 * @property string $nome_item
 * @property string $descricao
 * @property string $preco
 *
 * @property Cardapiotipo $cardapioTipo
 * @property Gastronomia $gastronomia
 */
class CardapioItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cardapioitens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gastronomia_id', 'cardapioTipo_id'], 'integer'],
            [['descricao'], 'string'],
            [['preco'], 'number'],
            [['nome_item'], 'string', 'max' => 50],
            [['cardapioTipo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cardapiotipo::className(), 'targetAttribute' => ['cardapioTipo_id' => 'id']],
            [['gastronomia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gastronomia::className(), 'targetAttribute' => ['gastronomia_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gastronomia_id' => 'Gastronomia ID',
            'cardapioTipo_id' => 'Cardapio Tipo ID',
            'nome_item' => 'Nome Item',
            'descricao' => 'Descricao',
            'preco' => 'Preco',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCardapioTipo()
    {
        return $this->hasOne(Cardapiotipo::className(), ['id' => 'cardapioTipo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGastronomia()
    {
        return $this->hasOne(Gastronomia::className(), ['id' => 'gastronomia_id']);
    }
    /*realiza a listagem dos tipos de cardâpio de acordo com a loja.
        Exemplo: a loja X possui os tipos Doces, Salgados e Bebidas*/
    public function listaTiposCardapio($gastronomia_id){
        $query = new Query();
        $tipos = $query->select("main.*,ct.tipo AS tipo_cardapio")
                       ->from("cardapiotipo_gastronomia main")
                       ->innerJoin("cardapiotipo ct","main.cardapioTipo_id = ct.id")
                       ->where(["main.gastronomia_id" => $gastronomia_id])
                       ->orderBy("ct.tipo")->all();
        return $tipos;
    }
    /*realiza a listagem de itens vendidos de acordo com a loja*/
    public function lista($gastronomia_id){
        $query = new Query();
        $itens = $query->select("carTipo.tipo AS cardapio_tipo, carItem.*")
                       ->from("cardapioItens carItem")
                       ->leftJoin("cardapioTipo carTipo","carItem.cardapioTipo_id = carTipo.id")
                       ->where(['carItem.gastronomia_id' => $gastronomia_id])
                       ->orderBy('carTipo.tipo,carItem.nome_item')->all();
        return $itens;
    }
    public function listAllTiposCardapio(){
        $query = new Query();
        $tipos = $query->select("*")->from("cardapiotipo")->orderBy("tipo")->all();
        return $tipos;
    }
}