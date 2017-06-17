<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "status_exibicao".
 *
 * @property integer $id
 * @property string $descricao
 *
 * @property Filmes[] $filmes
 */
class StatusExibicao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_exibicao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao'], 'required'],
            [['descricao'], 'string', 'max' => 20],
            [['descricao'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmes()
    {
        return $this->hasMany(Filmes::className(), ['status_id' => 'id']);
    }
    /**
        *lista os status de exibição relacionado aos filmes
        *@return $status: os status de exibição encontrados
    */
    public function listaRelFilmes(){
        $query = new Query();
        $status = $query
        ->select("stu.id,stu.descricao")
        ->distinct()
        ->from("status_exibicao stu")
        ->rightJoin("filmes fil","stu.id = fil.status_id")
        ->orderBy("stu.descricao")
        ->all();
        return $status;
    }
}
