<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_vacunas".
 *
 * @property int $id_vacuna
 * @property string $nombre
 */
class TblVacunas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_vacunas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_vacuna' => 'Id Vacuna',
            'nombre' => 'Nombre',
        ];
    }
}
