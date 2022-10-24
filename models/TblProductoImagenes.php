<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_producto_imagenes".
 *
 * @property int $id_imagen
 * @property int $id_producto
 * @property string $imagen
 *
 * @property TblProductos $producto
 */
class TblProductoImagenes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_producto_imagenes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_producto'], 'required'],
            [['id_producto'], 'integer'],
            [['imagen'], 'string', 'max' => 255],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => TblProductos::class, 'targetAttribute' => ['id_producto' => 'id_producto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_imagen' => 'Id',
            'id_producto' => 'Id Producto',
            'imagen' => 'Imagenes',
        ];
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
