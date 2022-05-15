<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_det_compras".
 *
 * @property int $id_det_compra
 * @property int $id_compra
 * @property int $id_producto
 * @property float $precio
 * @property int $cantidad
 *
 * @property TblCompras $compra
 * @property TblProductos $producto
 */
class TblDetCompras extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_det_compras';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_compra', 'id_producto', 'precio', 'cantidad'], 'required'],
            [['id_compra', 'id_producto', 'cantidad'], 'integer'],
            [['precio'], 'number'],
            [['id_compra'], 'exist', 'skipOnError' => true, 'targetClass' => TblCompras::className(), 'targetAttribute' => ['id_compra' => 'id_compra']],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => TblProductos::className(), 'targetAttribute' => ['id_producto' => 'id_producto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_det_compra' => 'Id Det Compra',
            'id_compra' => 'Id Compra',
            'id_producto' => 'Id Producto',
            'precio' => 'Precio',
            'cantidad' => 'Cantidad',
        ];
    }

    /**
     * Gets query for [[Compra]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompra()
    {
        return $this->hasOne(TblCompras::className(), ['id_compra' => 'id_compra']);
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(TblProductos::className(), ['id_producto' => 'id_producto']);
    }
}
