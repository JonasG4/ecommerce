<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_especies".
 *
 * @property int $id_especie
 * @property string $nombre
 * @property int $user_ing
 * @property string $fecha_ing
 * @property int $user_mod
 * @property string $fecha_mod
 * @property int $visible
 *
 * @property TblRazas[] $tblRazas
 * @property TblUsuarios $userIng
 * @property TblUsuarios $userMod
 */
class TblEspecies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_especies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'user_ing', 'fecha_ing', 'user_mod', 'fecha_mod', 'visible'], 'required'],
            [['user_ing', 'user_mod', 'visible'], 'integer'],
            [['fecha_ing', 'fecha_mod'], 'safe'],
            [['nombre'], 'string', 'max' => 255],
            [['user_ing'], 'exist', 'skipOnError' => true, 'targetClass' => TblUsuarios::class, 'targetAttribute' => ['user_ing' => 'id_usuario']],
            [['user_mod'], 'exist', 'skipOnError' => true, 'targetClass' => TblUsuarios::class, 'targetAttribute' => ['user_mod' => 'id_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_especie' => 'Id',
            'nombre' => 'Nombre',
            'user_ing' => 'User Ing',
            'fecha_ing' => 'Fecha Ingreso',
            'user_mod' => 'User Mod',
            'fecha_mod' => 'Fecha Modificacion',
            'visible' => 'Visible',
        ];
    }

    /**
     * Gets query for [[TblRazas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblRazas()
    {
        return $this->hasMany(TblRazas::class, ['id_especie' => 'id_especie']);
    }

    /**
     * Gets query for [[UserIng]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserIng()
    {
        return $this->hasOne(TblUsuarios::class, ['id_usuario' => 'user_ing']);
    }

    /**
     * Gets query for [[UserMod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserMod()
    {
        return $this->hasOne(TblUsuarios::class, ['id_usuario' => 'user_mod']);
    }
}
