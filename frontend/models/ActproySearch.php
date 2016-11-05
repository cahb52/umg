<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ActProy;

/**
 * ActproySearch represents the model behind the search form about `app\models\ActProy`.
 */
class ActproySearch extends ActProy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idAct_Proy', 'TipoAp', 'EstadoAP', 'carrera_idcarrera', 'ciclo_idciclo', 'curso_idciclo'], 'integer'],
            [['NombreActividad', 'DescripcionActividad', 'FechaPublicacion', 'RutaArchivo'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = ActProy::find();

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
            'idAct_Proy' => $this->idAct_Proy,
            'FechaPublicacion' => $this->FechaPublicacion,
            'TipoAp' => $this->TipoAp,
            'EstadoAP' => $this->EstadoAP,
            'carrera_idcarrera' => $this->carrera_idcarrera,
            'ciclo_idciclo' => $this->ciclo_idciclo,
            'curso_idciclo' => $this->curso_idciclo,
        ]);

        $query->andFilterWhere(['like', 'NombreActividad', $this->NombreActividad])
            ->andFilterWhere(['like', 'DescripcionActividad', $this->DescripcionActividad])
            ->andFilterWhere(['like', 'RutaArchivo', $this->RutaArchivo]);

        return $dataProvider;
    }
}
