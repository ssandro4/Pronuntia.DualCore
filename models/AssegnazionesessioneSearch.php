<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Assegnazionesessione;

/**
 * AssegnazionesessioneSearch represents the model behind the search form of `app\models\Assegnazionesessione`.
 */
class AssegnazionesessioneSearch extends Assegnazionesessione
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sessione', 'elencoErrori', 'esito', 'note', 'dataCreazione'], 'safe'],
            [['paziente', 'nuovo', 'cntErrori'], 'integer'],
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
        $query = Assegnazionesessione::find();

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
            'paziente' => $this->paziente,
            'nuovo' => $this->nuovo,
            'cntErrori' => $this->cntErrori,
            'dataCreazione' => $this->dataCreazione,
        ]);

        $query->andFilterWhere(['like', 'sessione', $this->sessione])
            ->andFilterWhere(['like', 'elencoErrori', $this->elencoErrori])
            ->andFilterWhere(['like', 'esito', $this->esito])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
