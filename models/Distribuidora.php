<?php

namespace app\models;
use Yii;
use yii\db\Query;
/**
 * This is the model class for table "distribuidoras".
 *
 * @property integer $id
 * @property string $nome
 *
 * @property Filmes[] $filmes
 */
class Distribuidora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'distribuidoras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 200],
            [['nome'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmes()
    {
        return $this->hasMany(Filme::className(), ['distribuidora_id' => 'id']);
    }
    /**
        *retorna as distribuidoras relacionadas com os filmes
        *@return $distribuidoras: distribuidoras encontradas na pesquisa
    */
    public function listaRelFilmes(){
        $query = new Query();
        $distribuidoras = $query
        ->select("dist.id,dist.nome")
        ->distinct()
        ->from("distribuidoras dist")
        ->rightJoin("filmes fil","dist.id = fil.distribuidora_id")
        ->orderBy("dist.nome")
        ->all();
        return $distribuidoras;
    }
}
