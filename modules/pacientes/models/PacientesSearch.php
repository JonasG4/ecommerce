<?php

namespace app\modules\pacientes\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblPacientes;

/**
 * PacientesSearch represents the model behind the search form of `app\models\TblPacientes`.
 */
class PacientesSearch extends TblPacientes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_paciente', 'id_representante', 'id_especie', 'id_raza', 'user_ing', 'user_mod', 'activo'], 'integer'],
            [['cod_paciente', 'nombre', 'imagen', 'sexo', 'fecha_nac', 'color', 'caracteristicas', 'alergias', 'fecha_ing', 'fecha_mod'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TblPacientes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_paciente' => $this->id_paciente,
            'id_representante' => $this->id_representante,
            'id_especie' => $this->id_especie,
            'id_raza' => $this->id_raza,
            'fecha_nac' => $this->fecha_nac,
            'user_ing' => $this->user_ing,
            'fecha_ing' => $this->fecha_ing,
            'user_mod' => $this->user_mod,
            'fecha_mod' => $this->fecha_mod,
            'activo' => $this->activo,
        ]);

        $query->andFilterWhere(['like', 'cod_paciente', $this->cod_paciente])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'imagen', $this->imagen])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'caracteristicas', $this->caracteristicas])
            ->andFilterWhere(['like', 'alergias', $this->alergias]);

        return $dataProvider;
    }
}
