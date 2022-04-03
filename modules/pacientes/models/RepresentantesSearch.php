<?php

namespace app\modules\pacientes\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblRepresentantes;

/**
 * RepresentantesSearch represents the model behind the search form of `app\models\TblRepresentantes`.
 */
class RepresentantesSearch extends TblRepresentantes
{
    
    public $nombreCompleto;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_representante', 'id_departamento', 'id_municipio', 'user_ing', 'user_mod', 'activo'], 'integer'],
            [['cod_representante', 'nombre', 'apellido', 'direccion', 'dui', 'telefono', 'correo_electronico', 'fecha_ing', 'fecha_mod', 'nombreCompleto'], 'safe'],
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
        $query = TblRepresentantes::find();

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

        //FIX: Sorting para campo Nombre Completo 
        $dataProvider->sort->attributes['nombreCompleto'] = [
            'asc' => ['nombre' => SORT_ASC, 'apellido' => SORT_ASC],
            'desc' => ['nombre' => SORT_DESC, 'apellido' => SORT_DESC],
            'label' => 'nombreCompleto',
            'default' => SORT_ASC,
        ];

        // grid filtering conditions
        $query->andFilterWhere([
            'id_representante' => $this->id_representante,
            'id_departamento' => $this->id_departamento,
            'id_municipio' => $this->id_municipio,
            'user_ing' => $this->user_ing,
            'fecha_ing' => $this->fecha_ing,
            'user_mod' => $this->user_mod,
            'fecha_mod' => $this->fecha_mod,
            'activo' => $this->activo,
        ]);

        $query->andFilterWhere(['like', 'cod_representante', $this->cod_representante])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'dui', $this->dui])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'correo_electronico', $this->correo_electronico]);

        //FIX: Filtros para campo NombreCompleto 

        $query->andFilterWhere(
            [
                'or',
                ['like', 'nombre', $this->nombreCompleto],
                ['like', 'apellido', $this->nombreCompleto],
                ['like', 'CONCAT_WS(" ",`nombre`, `apellido`)', $this->nombreCompleto],
            ]
        );

        return $dataProvider;
    }
}
