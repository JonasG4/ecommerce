<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_pacientes_vacunas".
 *
 * @property int $id_paciente
 * @property int $id_vacuna
 *
 * @property TblPacientes $paciente
 * @property TblVacunas $vacuna
 */
class TblPacientesVacunas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_pacientes_vacunas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_paciente', 'id_vacuna'], 'required'],
            [['id_paciente', 'id_vacuna'], 'integer'],
            [['id_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => TblPacientes::className(), 'targetAttribute' => ['id_paciente' => 'id_paciente']],
            [['id_vacuna'], 'exist', 'skipOnError' => true, 'targetClass' => TblVacunas::className(), 'targetAttribute' => ['id_vacuna' => 'id_vacuna']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_paciente' => 'Id Paciente',
            'id_vacuna' => 'Id Vacuna',
        ];
    }

    /**
     * Gets query for [[Paciente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente()
    {
        return $this->hasOne(TblPacientes::className(), ['id_paciente' => 'id_paciente']);
    }

    /**
     * Gets query for [[Vacuna]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacuna()
    {
        return $this->hasOne(TblVacunas::className(), ['id_vacuna' => 'id_vacuna']);
    }
}
