<?php

namespace app\modules\inventario\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblProductos;

/**
 * ProductosSearch represents the model behind the search form of `app\models\TblProductos`.
 */
class ProductosSearch extends TblProductos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_producto', 'id_categoria', 'id_imagenes', 'min_stock', 'user_ing', 'user_mod', 'estado'], 'integer'],
            [['nombre', 'descripcion', 'fecha_ing', 'fecha_mod'], 'safe'],
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
        $query = TblProductos::find();

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
            'id_producto' => $this->id_producto,
            'id_categoria' => $this->id_categoria,
            'precio' => $this->precio,
            'id_imagenes' => $this->id_imagenes,
            'min_stock' => $this->min_stock,
            'fecha_ing' => $this->fecha_ing,
            'user_ing' => $this->user_ing,
            'fecha_mod' => $this->fecha_mod,
            'user_mod' => $this->user_mod,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
