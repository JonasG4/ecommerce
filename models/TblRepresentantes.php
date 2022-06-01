<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_representantes".
 *
 * @property int $id_representante
 * @property string $cod_representante
 * @property string $nombre
 * @property string $apellido
 * @property string $direccion
 * @property int $id_departamento
 * @property int $id_municipio
 * @property string $dui
 * @property string $telefono
 * @property string $correo_electronico
 * @property int $user_ing
 * @property string $fecha_ing
 * @property int $user_mod
 * @property string $fecha_mod
 * @property int $activo
 *
 * @property TblDepartamentos $departamento
 * @property TblMunicipios $municipio
 * @property TblUsuarios $userIng
 * @property TblUsuarios $userMod
 */
class TblRepresentantes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_representantes';
    }

    //? Getter para nombre completo de representante
    public function getNombreCompleto(){
        return $this->nombre . ' ' . $this->apellido;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cod_representante', 'nombre', 'apellido', 'direccion', 'id_departamento', 'id_municipio', 'dui', 'telefono', 'correo_electronico', 'user_ing', 'fecha_ing', 'user_mod', 'fecha_mod', 'activo'], 'required'],
            [['direccion'], 'string'],
            [['id_departamento', 'id_municipio', 'user_ing', 'user_mod', 'activo'], 'integer'],
            [['fecha_ing', 'fecha_mod'], 'safe'],
            [['cod_representante', 'telefono'], 'string', 'max' => 25],
            [['nombre', 'apellido'], 'string', 'max' => 255],
            [['dui'], 'string', 'max' => 10],
            [['correo_electronico'], 'string', 'max' => 50],
            [['id_departamento'], 'exist', 'skipOnError' => true, 'targetClass' => TblDepartamentos::class, 'targetAttribute' => ['id_departamento' => 'id_departamento']],
            [['id_municipio'], 'exist', 'skipOnError' => true, 'targetClass' => TblMunicipios::class, 'targetAttribute' => ['id_municipio' => 'id_municipio']],
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
            'id_representante' => 'Id',
            'cod_representante' => 'Codigo',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'direccion' => 'Direccion',
            'id_departamento' => 'Departamento',
            'id_municipio' => 'Municipio',
            'dui' => 'Dui',
            'telefono' => 'Telefono',
            'correo_electronico' => 'Correo',
            'user_ing' => 'User Ing',
            'fecha_ing' => 'Fecha Ing',
            'user_mod' => 'User Mod',
            'fecha_mod' => 'Fecha Mod',
            'activo' => 'Activo',
            'nombreCompleto' => 'Representante',
        ];
    }

    /**
     * Gets query for [[Departamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(TblDepartamentos::class, ['id_departamento' => 'id_departamento']);
    }

    /**
     * Gets query for [[Municipio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio()
    {
        return $this->hasOne(TblMunicipios::class, ['id_municipio' => 'id_municipio']);
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
