<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_pacientes".
 *
 * @property int $id_paciente
 * @property string $cod_paciente
 * @property int $id_representante
 * @property string $nombre
 * @property string $imagen
 * @property int $id_especie
 * @property int $id_raza
 * @property string $sexo
 * @property string $fecha_nac
 * @property string $color
 * @property string|null $caracteristicas
 * @property string|null $alergias
 * @property int $user_ing
 * @property string $fecha_ing
 * @property int $user_mod
 * @property string $fecha_mod
 * @property int $activo
 *
 * @property TblEspecies $especie
 * @property TblRazas $raza
 * @property TblRepresentantes $representante
 * @property TblUsuarios $userIng
 * @property TblUsuarios $userMod
 */
class TblPacientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_pacientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cod_paciente', 'id_representante', 'nombre', 'imagen', 'id_especie', 'id_raza', 'sexo', 'fecha_nac', 'color', 'user_ing', 'fecha_ing', 'user_mod', 'fecha_mod', 'activo'], 'required'],
            [['id_representante', 'id_especie', 'id_raza', 'user_ing', 'user_mod', 'activo'], 'integer'],
            [['fecha_nac', 'fecha_ing', 'fecha_mod'], 'safe'],
            [['caracteristicas', 'alergias'], 'string'],
            [['cod_paciente'], 'string', 'max' => 25],
            [['nombre', 'imagen', 'color'], 'string', 'max' => 255],
            [['sexo'], 'string', 'max' => 1],
            [['id_especie'], 'exist', 'skipOnError' => true, 'targetClass' => TblEspecies::class, 'targetAttribute' => ['id_especie' => 'id_especie']],
            [['id_raza'], 'exist', 'skipOnError' => true, 'targetClass' => TblRazas::class, 'targetAttribute' => ['id_raza' => 'id_raza']],
            [['id_representante'], 'exist', 'skipOnError' => true, 'targetClass' => TblRepresentantes::class, 'targetAttribute' => ['id_representante' => 'id_representante']],
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
            'id_paciente' => 'Id',
            'cod_paciente' => 'Codigo',
            'id_representante' => 'Representante',
            'nombre' => 'Nombre',
            'imagen' => 'Imagen',
            'id_especie' => 'Especie',
            'id_raza' => 'Raza',
            'sexo' => 'Sexo',
            'fecha_nac' => 'Fecha Nac',
            'color' => 'Color',
            'caracteristicas' => 'Caracteristicas',
            'alergias' => 'Alergias',
            'user_ing' => 'User Ing',
            'fecha_ing' => 'Fecha Ing',
            'user_mod' => 'User Mod',
            'fecha_mod' => 'Fecha Mod',
            'activo' => 'Activo',
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
     * Gets query for [[Raza]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRaza()
    {
        return $this->hasOne(TblRazas::class, ['id_raza' => 'id_raza']);
    }

    /**
     * Gets query for [[Representante]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepresentante()
    {
        return $this->hasOne(TblRepresentantes::class, ['id_representante' => 'id_representante']);
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
