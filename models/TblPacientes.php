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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_paciente' => 'Id Paciente',
            'cod_paciente' => 'Cod Paciente',
            'id_representante' => 'Id Representante',
            'nombre' => 'Nombre',
            'imagen' => 'Imagen',
            'id_especie' => 'Id Especie',
            'id_raza' => 'Id Raza',
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
}
