<?php

namespace app\modules\pacientes\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblRazas;

/**
 * RazasSearch represents the model behind the search form of `app\models\TblRazas`.
 */
class RazasSearch extends TblRazas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_raza', 'id_especie', 'user_ing', 'user_mod', 'visible'], 'integer'],
            [['nombre', 'fecha_ing', 'fecha_mod'], 'safe'],
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
        $query = TblRazas::find();

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
            'id_raza' => $this->id_raza,
            'id_especie' => $this->id_especie,
            'user_ing' => $this->user_ing,
            'fecha_ing' => $this->fecha_ing,
            'user_mod' => $this->user_mod,
            'fecha_mod' => $this->fecha_mod,
            'visible' => $this->visible,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
