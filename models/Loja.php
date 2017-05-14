<?php
namespace app\models;
use Yii;
use yii\db\Query;
/**
 * This is the model class for table "lojas".
 *
 * @property integer $id
 * @property integer $categoria_id
 * @property string $nome_loja
 * @property string $descricao
 * @property string $localizacao
 *
 * @property Categorias $categoria
 */
class Loja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lojas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoria_id'], 'integer'],
            [['nome_loja'], 'required'],
            [['descricao', 'localizacao'], 'string'],
            [['nome_loja'], 'string', 'max' => 50],
            [['nome_loja'], 'unique'],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria_id' => 'Categoria',
            'nome_loja' => 'Loja',
            'descricao' => 'Descrição',
            'localizacao' => 'Localização',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::className(), ['id' => 'categoria_id']);
    }
    /**
     * @return lojas: lista de lojas, de acordo com a pesquisa
    */
    public function lista(){
        $query = new Query();
        $lojas = $query->select("l.*,c.nome AS categoria_nome")
                       ->from("lojas l")
                       ->innerJoin("categorias c","l.categoria_id = c.id")
                       ->orderBy("l.nome_loja")
                       ->all();
        return $lojas;
    }
}
