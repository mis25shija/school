<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StudentAdmParticular;

/**
 * StudentAdmParticularSearch represents the model behind the search form of `app\models\StudentAdmParticular`.
 */
class StudentAdmParticularSearch extends StudentAdmParticular
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'student_id', 'created_by'], 'integer'],
            [['particular_name', 'created_date', 'record_status'], 'safe'],
            [['price','due_amount'], 'number'],
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
        $query = StudentAdmParticular::find();

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
            'student_id' => $this->student_id,
            'price' => $this->price,
            'created_by' => $this->created_by,
            'due_amount' => $this->due_amount,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'particular_name', $this->particular_name])
            ->andFilterWhere(['like', 'record_status', $this->record_status]);

        return $dataProvider;
    }
}
