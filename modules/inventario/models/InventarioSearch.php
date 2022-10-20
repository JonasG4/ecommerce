<?php

namespace app\modules\inventario\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblInventario;

/**
 * InventarioSearch represents the model behind the search form of `app\models\TblInventario`.
 */
class InventarioSearch extends TblInventario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_inventario', 'id_compra', 'id_producto', 'cantidad', 'cant_original'], 'integer'],
            [['numero_ingreso'], 'safe'],
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
        $query = TblInventario::find();

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
            'id_inventario' => $this->id_inventario,
            'id_compra' => $this->id_compra,
            'id_producto' => $this->id_producto,
            'cantidad' => $this->cantidad,
            'cant_original' => $this->cant_original,
        ]);

        $query->andFilterWhere(['like', 'numero_ingreso', $this->numero_ingreso]);

        return $dataProvider;
    }
}
