<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_proveedores".
 *
 * @property int $id_proveedor
 * @property string $nombre
 * @property string $telefono
 * @property string $direccion
 * @property string $fecha_ing
 * @property int $user_ing
 * @property string $fecha_mod
 * @property int $user_mod
 * @property int $estado
 *
 * @property TblCompras[] $tblCompras
 * @property TblUsuarios $userIng
 * @property TblUsuarios $userMod
 */
class TblProveedores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_proveedores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'telefono', 'direccion', 'fecha_ing', 'user_ing', 'fecha_mod', 'user_mod', 'estado'], 'required'],
            [['direccion'], 'string'],
            [['fecha_ing', 'fecha_mod'], 'safe'],
            [['user_ing', 'user_mod', 'estado'], 'integer'],
            [['nombre', 'telefono'], 'string', 'max' => 255],
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
            'id_proveedor' => 'Id Proveedor',
            'nombre' => 'Nombre',
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
            'fecha_ing' => 'Fecha Ing',
            'user_ing' => 'User Ing',
            'fecha_mod' => 'Fecha Mod',
            'user_mod' => 'User Mod',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[TblCompras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblCompras()
    {
        return $this->hasMany(TblCompras::className(), ['id_proveedor' => 'id_proveedor']);
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
