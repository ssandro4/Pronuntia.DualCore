<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Parola;

/**
 * ParolaSearch represents the model behind the search form of `app\models\Parola`.
 */
class ParolaSearch extends Parola
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idParola', 'tag', 'pathIMG', 'pathMP3'], 'safe'],
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
        $query = Parola::find();

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
        $query->andFilterWhere(['like', 'idParola', $this->idParola])
            ->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'pathIMG', $this->pathIMG])
            ->andFilterWhere(['like', 'pathMP3', $this->pathMP3]);

        return $dataProvider;
    }
}
