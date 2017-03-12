<?php
namespace app\models;
use Yii;

/**
 * This is the model class for table "areas".
 *
 * @property integer $id
 * @property string $nome
 *
 * @property Categorias[] $categorias
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'areas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 40],
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
    public function getCategorias()
    {
        return $this->hasMany(Categorias::className(), ['area_id' => 'id']);
    }
    /*lista todas as áreas cadastradas*/
    public function lista(){
        return Area::find()->orderBy("nome")->all();
    }
}
