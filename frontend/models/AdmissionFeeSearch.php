<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AdmissionFee;

/**
 * AdmissionFeeSearch represents the model behind the search form of `app\models\AdmissionFee`.
 */
class AdmissionFeeSearch extends AdmissionFee
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'class_info_id', 'session_id', 'created_by', 'updated_by'], 'integer'],
            [['new_student_adm_fee', 'old_student_adm_fee', 'fine_amount'], 'number'],
            [['adm_last_date', 'created_date', 'updated_date', 'record_status'], 'safe'],
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
        $query = AdmissionFee::find();

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
            'new_student_adm_fee' => $this->new_student_adm_fee,
            'old_student_adm_fee' => $this->old_student_adm_fee,
            'class_info_id' => $this->class_info_id,
            'session_id' => $this->session_id,
            'fine_amount' => $this->fine_amount,
            'adm_last_date' => $this->adm_last_date,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'record_status', $this->record_status]);

        return $dataProvider;
    }
}
