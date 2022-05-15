<?php

namespace app\modules\inventario\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblDetCompras;

/**
 * DetComprasSearch represents the model behind the search form of `app\models\TblDetCompras`.
 */
class DetComprasSearch extends TblDetCompras
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_det_compra', 'id_compra', 'id_producto', 'cantidad'], 'integer'],
            [['precio'], 'number'],
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
        $query = TblDetCompras::find();

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
            'id_det_compra' => $this->id_det_compra,
            'id_compra' => $this->id_compra,
            'id_producto' => $this->id_producto,
            'precio' => $this->precio,
            'cantidad' => $this->cantidad,
        ]);

        return $dataProvider;
    }
}
