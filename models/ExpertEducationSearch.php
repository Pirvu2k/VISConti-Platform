<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ExpertEducation;

/**
 * ExpertEducationSearch represents the model behind the search form about `app\models\ExpertEducation`.
 */
class ExpertEducationSearch extends ExpertEducation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['user_id', 'degree', 'institution', 'from', 'degree_details', 'to'], 'safe'],
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
        $query = ExpertEducation::find();

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
            'id' => $this->id,
            'user_id' => Yii::$app->user->id,
        ]);

        $query->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'degree', $this->degree])
            ->andFilterWhere(['like', 'institution', $this->institution])
            ->andFilterWhere(['like', 'from', $this->from])
            ->andFilterWhere(['like', 'degree_details', $this->degree_details])
            ->andFilterWhere(['like', 'to', $this->to]);

        return $dataProvider;
    }
}
