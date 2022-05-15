<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_productos".
 *
 * @property int $id_producto
 * @property string $nombre
 * @property int $min_stock
 * @property string $fecha_ing
 * @property int $user_ing
 * @property string $fecha_mod
 * @property int $user_mod
 * @property int $estado
 *
 * @property TblDetCompras[] $tblDetCompras
 * @property TblInventario[] $tblInventarios
 * @property TblUsuarios $userIng
 * @property TblUsuarios $userMod
 */
class TblProductos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'min_stock', 'fecha_ing', 'user_ing', 'fecha_mod', 'user_mod', 'estado'], 'required'],
            [['min_stock', 'user_ing', 'user_mod', 'estado'], 'integer'],
            [['fecha_ing', 'fecha_mod'], 'safe'],
            [['nombre'], 'string', 'max' => 255],
            [['user_ing'], 'exist', 'skipOnError' => true, 'targetClass' => TblUsuarios::className(), 'targetAttribute' => ['user_ing' => 'id_usuario']],
            [['user_mod'], 'exist', 'skipOnError' => true, 'targetClass' => TblUsuarios::className(), 'targetAttribute' => ['user_mod' => 'id_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id Producto',
            'nombre' => 'Nombre',
            'min_stock' => 'Min Stock',
            'fecha_ing' => 'Fecha Ing',
            'user_ing' => 'User Ing',
            'fecha_mod' => 'Fecha Mod',
            'user_mod' => 'User Mod',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[TblDetCompras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblDetCompras()
    {
        return $this->hasMany(TblDetCompras::className(), ['id_producto' => 'id_producto']);
    }

    /**
     * Gets query for [[TblInventarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblInventarios()
    {
        return $this->hasMany(TblInventario::className(), ['id_producto' => 'id_producto']);
    }

    /**
     * Gets query for [[UserIng]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserIng()
    {
        return $this->hasOne(TblUsuarios::className(), ['id_usuario' => 'user_ing']);
    }

    /**
     * Gets query for [[UserMod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserMod()
    {
        return $this->hasOne(TblUsuarios::className(), ['id_usuario' => 'user_mod']);
    }
}
