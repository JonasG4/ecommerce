<?php

namespace app\modules\inventario\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblCompras;

/**
 * ComprasSearch represents the model behind the search form of `app\models\TblCompras`.
 */
class ComprasSearch extends TblCompras
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_compra', 'id_proveedor', 'user_ing', 'user_mod', 'estado'], 'integer'],
            [['fecha', 'num_documento', 'fecha_ing', 'fecha_mod'], 'safe'],
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
        $query = TblCompras::find();

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
            'id_compra' => $this->id_compra,
            'id_proveedor' => $this->id_proveedor,
            'fecha' => $this->fecha,
            'fecha_ing' => $this->fecha_ing,
            'user_ing' => $this->user_ing,
            'fecha_mod' => $this->fecha_mod,
            'user_mod' => $this->user_mod,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'num_documento', $this->num_documento]);

        return $dataProvider;
    }
}
