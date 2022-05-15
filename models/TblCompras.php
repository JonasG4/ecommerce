<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_compras".
 *
 * @property int $id_compra
 * @property int $id_proveedor
 * @property string $fecha
 * @property string $num_documento
 * @property string $fecha_ing
 * @property int $user_ing
 * @property string $fecha_mod
 * @property int $user_mod
 * @property int $estado
 *
 * @property TblProveedores $proveedor
 * @property TblDetCompras[] $tblDetCompras
 * @property TblInventario[] $tblInventarios
 * @property TblUsuarios $userIng
 * @property TblUsuarios $userMod
 */
class TblCompras extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_compras';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_proveedor', 'fecha', 'num_documento', 'fecha_ing', 'user_ing', 'fecha_mod', 'user_mod', 'estado'], 'required'],
            [['id_proveedor', 'user_ing', 'user_mod', 'estado'], 'integer'],
            [['fecha', 'fecha_ing', 'fecha_mod'], 'safe'],
            [['num_documento'], 'string', 'max' => 255],
            [['id_proveedor'], 'exist', 'skipOnError' => true, 'targetClass' => TblProveedores::className(), 'targetAttribute' => ['id_proveedor' => 'id_proveedor']],
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
            'id_compra' => 'Id Compra',
            'id_proveedor' => 'Id Proveedor',
            'fecha' => 'Fecha',
            'num_documento' => 'Num Documento',
            'fecha_ing' => 'Fecha Ing',
            'user_ing' => 'User Ing',
            'fecha_mod' => 'Fecha Mod',
            'user_mod' => 'User Mod',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Proveedor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProveedor()
    {
        return $this->hasOne(TblProveedores::className(), ['id_proveedor' => 'id_proveedor']);
    }

    /**
     * Gets query for [[TblDetCompras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblDetCompras()
    {
        return $this->hasMany(TblDetCompras::className(), ['id_compra' => 'id_compra']);
    }

    /**
     * Gets query for [[TblInventarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblInventarios()
    {
        return $this->hasMany(TblInventario::className(), ['id_compra' => 'id_compra']);
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
