<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_inventario".
 *
 * @property int $id_inventario
 * @property int $id_compra
 * @property int $id_producto
 * @property int $cantidad
 * @property int $cant_original
 * @property string $numero_ingreso
 *
 * @property TblCompras $compra
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
            [['id_compra', 'id_producto', 'cantidad', 'cant_original', 'numero_ingreso'], 'required'],
            [['id_compra', 'id_producto', 'cantidad', 'cant_original'], 'integer'],
            [['numero_ingreso'], 'string', 'max' => 255],
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
            'id_inventario' => 'Id Inventario',
            'id_compra' => 'Id Compra',
            'id_producto' => 'Id Producto',
            'cantidad' => 'Cantidad',
            'cant_original' => 'Cant Original',
            'numero_ingreso' => 'Numero Ingreso',
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
