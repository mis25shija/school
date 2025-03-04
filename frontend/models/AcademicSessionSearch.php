<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcademicSession;

/**
 * AcademicSessionSearch represents the model behind the search form of `app\models\AcademicSession`.
 */
class AcademicSessionSearch extends AcademicSession
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','created_by', 'updated_by'], 'integer'],
            [['session_name', 'session_start_date', 'session_end_date', 'created_date', 'updated_date', 'record_status', 'active_status'], 'safe'],
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
        $query = AcademicSession::find();

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
            'session_start_date' => $this->session_start_date,
            'session_end_date' => $this->session_end_date,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'session_name', $this->session_name])
            ->andFilterWhere(['like', 'active_status', $this->active_status])
            ->andFilterWhere(['like', 'record_status', $this->record_status]);

        return $dataProvider;
    }
}
