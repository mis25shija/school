<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcademicFee;

/**
 * AcademicFeeSearch represents the model behind the search form of `app\models\AcademicFee`.
 */
class AcademicFeeSearch extends AcademicFee
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'class_info_id', 'session_id', 'created_by', 'updated_by'], 'integer'],
            [['academic_fee_name', 'fee_last_date', 'created_date', 'updated_date', 'record_status'], 'safe'],
            [['academic_fee_amount', 'fine_amount'], 'number'],
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
        $query = AcademicFee::find();

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
            'academic_fee_amount' => $this->academic_fee_amount,
            'class_info_id' => $this->class_info_id,
            'session_id' => $this->session_id,
            'fine_amount' => $this->fine_amount,
            'fee_last_date' => $this->fee_last_date,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'academic_fee_name', $this->academic_fee_name])
            ->andFilterWhere(['like', 'record_status', $this->record_status]);

        return $dataProvider;
    }
}
