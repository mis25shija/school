<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StudentAdmInfo;

/**
 * StudentAdmInfoSearch represents the model behind the search form of `app\models\StudentAdmInfo`.
 */
class StudentAdmInfoSearch extends StudentAdmInfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'student_id', 'created_by', 'updated_by'], 'integer'],
            [['total_fee', 'discount', 'fine', 'payable_amount', 'amount_received', 'due_amount'], 'number'],
            [['created_date', 'updated_date', 'record_status'], 'safe'],
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
        $query = StudentAdmInfo::find();

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
            'total_fee' => $this->total_fee,
            'discount' => $this->discount,
            'fine' => $this->fine,
            'payable_amount' => $this->payable_amount,
            'amount_received' => $this->amount_received,
            'due_amount' => $this->due_amount,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'record_status', $this->record_status]);

        return $dataProvider;
    }
}
