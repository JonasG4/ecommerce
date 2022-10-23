<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_inventario".
 *
 * @property int $id
 * @property int $id_producto
 * @property int $cantidad
 *
 * @property TblProductos $producto
 */
class TblInventario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_inventario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_producto', 'cantidad'], 'required'],
            [['id_producto', 'cantidad'], 'integer'],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => TblProductos::class, 'targetAttribute' => ['id_producto' => 'id_producto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_producto' => 'Producto',
            'cantidad' => 'Cantidad',
        ];
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(TblProductos::class, ['id_producto' => 'id_producto']);
    }
}
