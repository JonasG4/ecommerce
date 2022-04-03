<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_departamentos".
 *
 * @property int $id_departamento
 * @property string $nombre
 * @property string $codigo
 *
 * @property TblMunicipios[] $tblMunicipios
 * @property TblRepresentantes[] $tblRepresentantes
 */
class TblDepartamentos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_departamentos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'codigo'], 'required'],
            [['nombre'], 'string', 'max' => 150],
            [['codigo'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_departamento' => 'Id Departamento',
            'nombre' => 'Nombre',
            'codigo' => 'Codigo',
        ];
    }

    /**
     * Gets query for [[TblMunicipios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblMunicipios()
    {
        return $this->hasMany(TblMunicipios::class, ['id_departamento' => 'id_departamento']);
    }

    /**
     * Gets query for [[TblRepresentantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblRepresentantes()
    {
        return $this->hasMany(TblRepresentantes::class, ['id_departamento' => 'id_departamento']);
    }
}
