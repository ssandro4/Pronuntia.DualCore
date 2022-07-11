<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Paziente;

/**
 * PazienteSearch represents the model behind the search form of `app\models\Paziente`.
 */
class PazienteSearch extends Paziente
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPaziente', 'caregiver', 'logopedista'], 'integer'],
            [['nome', 'cognome', 'diagnosi'], 'safe'],
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
        $query = Paziente::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query->where(['visibile'=>true]),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idPaziente' => $this->idPaziente,
            'caregiver' => $this->caregiver,
            'logopedista' => $this->logopedista,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cognome', $this->cognome])
            ->andFilterWhere(['like', 'diagnosi', $this->diagnosi]);

        return $dataProvider;
    }

    public function searchByLogopedista($idLogopedista)
    {
        $query = Paziente::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query->where(['visibile'=>true, 'logopedista'=>$idLogopedista]),
        ]);

        $this->load($idLogopedista);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idPaziente' => $this->idPaziente,
            'caregiver' => $this->caregiver,
            'logopedista' => $this->logopedista,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cognome', $this->cognome])
            ->andFilterWhere(['like', 'diagnosi', $this->diagnosi]);

        return $dataProvider;
    }
}
