<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_razas".
 *
 * @property int $id_raza
 * @property string $nombre
 * @property int $id_especie
 * @property int $user_ing
 * @property string $fecha_ing
 * @property int $user_mod
 * @property string $fecha_mod
 * @property int $visible
 *
 * @property TblEspecies $especie
 * @property TblUsuarios $userIng
 * @property TblUsuarios $userMod
 */
class TblRazas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_razas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'id_especie', 'user_ing', 'fecha_ing', 'user_mod', 'fecha_mod', 'visible'], 'required'],
            [['id_especie', 'user_ing', 'user_mod', 'visible'], 'integer'],
            [['fecha_ing', 'fecha_mod'], 'safe'],
            [['nombre'], 'string', 'max' => 255],
            [['id_especie'], 'exist', 'skipOnError' => true, 'targetClass' => TblEspecies::class, 'targetAttribute' => ['id_especie' => 'id_especie']],
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
            'id_raza' => 'Id',
            'nombre' => 'Nombre',
            'id_especie' => 'Especie',
            'user_ing' => 'User Ing',
            'fecha_ing' => 'Fecha Ingreso',
            'user_mod' => 'User Mod',
            'fecha_mod' => 'Fecha Modificacion',
            'visible' => 'Visible',
        ];
    }

    /**
     * Gets query for [[Especie]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEspecie()
    {
        return $this->hasOne(TblEspecies::class, ['id_especie' => 'id_especie']);
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
