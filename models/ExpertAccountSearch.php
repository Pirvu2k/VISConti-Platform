<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ExpertAccount;

/**
 * ExpertAccountSearch represents the model behind the search form about `app\models\ExpertAccount`.
 */
class ExpertAccountSearch extends ExpertAccount
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'birth_year', 'country', 'active_projects'], 'integer'],
            [['created_on', 'last_modified_on', 'trash', 'last_login_activity', 'title', 'given_name', 'family_name', 'email', 'password', 'reset_pass_exp_date', 'mobile', 'phone', 'fax', 'terms', 'confirmed'], 'safe'],
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
        $query = ExpertAccount::find();

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
            'created_on' => $this->created_on,
            'last_modified_on' => $this->last_modified_on,
            'last_login_activity' => $this->last_login_activity,
            'birth_year' => $this->birth_year,
            'reset_pass_exp_date' => $this->reset_pass_exp_date,
            'country' => $this->country,
            'active_projects' => $this->active_projects,
        ]);

        $query->andFilterWhere(['like', 'trash', $this->trash])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'given_name', $this->given_name])
            ->andFilterWhere(['like', 'family_name', $this->family_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'terms', $this->terms])
            ->andFilterWhere(['like', 'confirmed', $this->confirmed]);

        return $dataProvider;
    }
}
