<?php

/**
 * @link https://jrguevara.github.io.net
 * @copyright Copyright (c) 2022 jrCoding
 * @license https://www.yiiframework.com/license/
 */

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

/**
 * TblPacientes implementa las operaciones logicas para la tabla tbl_pacientes.
 * @author Jaime Guevara <jr.guevara@outlook.com>
 * @since 0.1
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

    public $vacunas;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cod_paciente', 'id_representante', 'nombre', 'id_especie', 'id_raza', 'sexo', 'fecha_nac', 'color', 'user_ing', 'fecha_ing', 'user_mod', 'fecha_mod', 'activo'], 'required'],
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
     * Getter para recuperar data de un solo paciente
     * @param int $id_paciente captura id de paciente
     * @return object $paciente con la informacion del paciente
     * @throws Exception not yet implemented
     */
    public static function getPaciente($id_paciente)
    {
        $paciente = TblPacientes::find()->where(['id_paciente' => $id_paciente])->one();
        return $paciente;
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
            'vacunas' => 'Lista de verificacion de vacunas',
        ];
    }

    /**
     * Consulta para [[TblEspecies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEspecie()
    {
        return $this->hasOne(TblEspecies::class, ['id_especie' => 'id_especie']);
    }

    /**
     * Consulta para [[TblRazas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRaza()
    {
        return $this->hasOne(TblRazas::class, ['id_raza' => 'id_raza']);
    }

    /**
     * Consulta para [[TblRepresentantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepresentante()
    {
        return $this->hasOne(TblRepresentantes::class, ['id_representante' => 'id_representante']);
    }

    /**
     * Consulta para [[TblPacientesVacunas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblPacientesVacunas()
    {
        return $this->hasMany(TblPacientesVacunas::class, ['id_paciente' => 'id_paciente']);
    }

    /**
     * Consulta para [[TblUsuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserIng()
    {
        return $this->hasOne(TblUsuarios::class, ['id_usuario' => 'user_ing']);
    }

    /**
     * Consulta para [[TblUsuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserMod()
    {
        return $this->hasOne(TblUsuarios::class, ['id_usuario' => 'user_mod']);
    }
}
