<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Composizionesessione;

/**
 * ComposizionesessioneSearch represents the model behind the search form of `app\models\Composizionesessione`.
 */
class ComposizionesessioneSearch extends Composizionesessione
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sessione', 'esercizio'], 'safe'],
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
        $query = Composizionesessione::find();

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
        $query->andFilterWhere(['like', 'sessione', $this->sessione])
            ->andFilterWhere(['like', 'esercizio', $this->esercizio]);

        return $dataProvider;
    }

    public function searchBySessione($idSessione)
    {
        $query = Composizionesessione::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query->where(['sessione'=>$idSessione]),
        ]);

        $this->load($idSessione);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'sessione', $this->sessione])
            ->andFilterWhere(['like', 'esercizio', $this->esercizio]);

        return $dataProvider;
    }
}
