<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StudentAccount;

/**
 * StudentAccountSearch represents the model behind the search form about `app\models\StudentAccount`.
 */
class StudentAccountSearch extends StudentAccount
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'birth_year'], 'integer'],
            [['created_on', 'last_modified_on', 'last_login_activity', 'trash', 'given_name', 'family_name', 'email', 'password', 'password_exp_date', 'mobile', 'phone', 'fax', 'agreed_terms', 'confirmed'], 'safe'],
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
        $query = StudentAccount::find();

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
            'password_exp_date' => $this->password_exp_date,
        ]);

        $query->andFilterWhere(['like', 'trash', $this->trash])
            ->andFilterWhere(['like', 'given_name', $this->given_name])
            ->andFilterWhere(['like', 'family_name', $this->family_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'agreed_terms', $this->agreed_terms])
            ->andFilterWhere(['like', 'confirmed', $this->confirmed]);

        return $dataProvider;
    }
}
