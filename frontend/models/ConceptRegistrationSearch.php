<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ConceptRegistration;

/**
 * ConceptRegistrationSearch represents the model behind the search form of `app\models\ConceptRegistration`.
 */
class ConceptRegistrationSearch extends ConceptRegistration
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'session_id', 'general_category_id',  'present_district_id', 'present_state_id',  'permanent_district_id', 'permanent_state_id'], 'integer'],
            [['application_date', 'student_name', 'dob', 'age', 'gender', 'phone_no', 'email', 'student_aadhaar_no', 'father_name', 'father_occupation', 'father_annual_income', 'mother_name', 'mother_occupation', 'mother_annual_income', 'parent_phone', 'parent_alt_phone', 'previous_school_name', 'previous_school_board', 'payment_upload', 'present_address','record_status','present_pincode', 'permanent_address', 'permanent_pincode'], 'safe'],
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
        $query = ConceptRegistration::find();

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
            'session_id' => $this->session_id,
            'application_date' => $this->application_date,
            'dob' => $this->dob,
            'general_category_id' => $this->general_category_id,
            'present_district_id' => $this->present_district_id,
            'present_state_id' => $this->present_state_id,
            'permanent_district_id' => $this->permanent_district_id,
            'permanent_state_id' => $this->permanent_state_id,
        ]);

        $query->andFilterWhere(['like', 'student_name', $this->student_name])
            ->andFilterWhere(['like', 'age', $this->age])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'present_address', $this->present_address])
            ->andFilterWhere(['like', 'permanent_address', $this->permanent_address])
            ->andFilterWhere(['like', 'student_aadhaar_no', $this->student_aadhaar_no])
            ->andFilterWhere(['like', 'father_name', $this->father_name])
            ->andFilterWhere(['like', 'present_pincode', $this->present_pincode])
            ->andFilterWhere(['like', 'permanent_pincode', $this->permanent_pincode])
            ->andFilterWhere(['like', 'father_occupation', $this->father_occupation])
            ->andFilterWhere(['like', 'father_annual_income', $this->father_annual_income])
            ->andFilterWhere(['like', 'mother_name', $this->mother_name])
            ->andFilterWhere(['like', 'mother_occupation', $this->mother_occupation])
            ->andFilterWhere(['like', 'mother_annual_income', $this->mother_annual_income])
            ->andFilterWhere(['like', 'parent_phone', $this->parent_phone])
            ->andFilterWhere(['like', 'parent_alt_phone', $this->parent_alt_phone])
            ->andFilterWhere(['like', 'previous_school_name', $this->previous_school_name])
            ->andFilterWhere(['like', 'previous_school_board', $this->previous_school_board])
            ->andFilterWhere(['like', 'payment_upload', $this->payment_upload])
            ->andFilterWhere(['like', 'record_status', $this->record_status]);

        return $dataProvider;
    }
}
