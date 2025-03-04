<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StudentInfo;

/**
 * StudentInfoSearch represents the model behind the search form of `app\models\StudentInfo`.
 */
class StudentInfoSearch extends StudentInfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'course_id', 'session_id', 'section_id', 'student_category_id', 'general_category_id', 'religion_id', 'roll_no', 'permanent_district_id', 'permanent_state_id', 'present_district_id', 'present_state_id', 'sibling_id', 'created_by', 'updated_by'], 'integer'],
            [['auth_key', 'password_hash', 'std_adm_no', 'adm_date', 'stud_name', 'stud_photo', 'stud_dob', 'gender', 'stud_email', 'stud_aadhaar_no', 'std_id_mark', 'blood_group', 'mother_tongue', 'nationality', 'father_name', 'father_occupation', 'father_annual_income', 'mother_name', 'mother_occupation', 'mother_annual_income', 'parent_phone', 'parent_alt_phone', 'permanent_address', 'permanent_pincode', 'present_address', 'present_pincode', 'have_sibling', 'stud_type', 'admission_status', 'created_date', 'updated_date', 'record_status'], 'safe'],
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
        $query = StudentInfo::find();

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
            'adm_date' => $this->adm_date,
            'stud_dob' => $this->stud_dob,
            'course_id' => $this->course_id,
            'session_id' => $this->session_id,
            'section_id' => $this->section_id,
            'student_category_id' => $this->student_category_id,
            'general_category_id' => $this->general_category_id,
            'religion_id' => $this->religion_id,
            'roll_no' => $this->roll_no,
            'permanent_district_id' => $this->permanent_district_id,
            'permanent_state_id' => $this->permanent_state_id,
            'present_district_id' => $this->present_district_id,
            'present_state_id' => $this->present_state_id,
            'sibling_id' => $this->sibling_id,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'std_adm_no', $this->std_adm_no])
            ->andFilterWhere(['like', 'stud_name', $this->stud_name])
            ->andFilterWhere(['like', 'stud_photo', $this->stud_photo])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'stud_email', $this->stud_email])
            ->andFilterWhere(['like', 'stud_aadhaar_no', $this->stud_aadhaar_no])
            ->andFilterWhere(['like', 'std_id_mark', $this->std_id_mark])
            ->andFilterWhere(['like', 'blood_group', $this->blood_group])
            ->andFilterWhere(['like', 'mother_tongue', $this->mother_tongue])
            ->andFilterWhere(['like', 'nationality', $this->nationality])
            ->andFilterWhere(['like', 'father_name', $this->father_name])
            ->andFilterWhere(['like', 'father_occupation', $this->father_occupation])
            ->andFilterWhere(['like', 'father_annual_income', $this->father_annual_income])
            ->andFilterWhere(['like', 'mother_name', $this->mother_name])
            ->andFilterWhere(['like', 'mother_occupation', $this->mother_occupation])
            ->andFilterWhere(['like', 'mother_annual_income', $this->mother_annual_income])
            ->andFilterWhere(['like', 'parent_phone', $this->parent_phone])
            ->andFilterWhere(['like', 'parent_alt_phone', $this->parent_alt_phone])
            ->andFilterWhere(['like', 'permanent_address', $this->permanent_address])
            ->andFilterWhere(['like', 'permanent_pincode', $this->permanent_pincode])
            ->andFilterWhere(['like', 'present_address', $this->present_address])
            ->andFilterWhere(['like', 'present_pincode', $this->present_pincode])
            ->andFilterWhere(['like', 'have_sibling', $this->have_sibling])
            ->andFilterWhere(['like', 'stud_type', $this->stud_type])
            ->andFilterWhere(['like', 'admission_status', $this->admission_status])
            ->andFilterWhere(['like', 'record_status', $this->record_status]);

        return $dataProvider;
    }
}
