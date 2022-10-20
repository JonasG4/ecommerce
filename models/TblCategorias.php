<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_categorias".
 *
 * @property int $id_categoria
 * @property string $nombre
 * @property string $descripcion
 */
class TblCategorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_categorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion'], 'required'],
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_categoria' => 'Id Categoria',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }
}
