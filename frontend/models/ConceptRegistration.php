<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "concept_registration".
 *
 * @property int $id
 * @property int $session_id
 * @property string $application_date
 * @property string $student_name
 * @property string $dob
 * @property string $age
 * @property string $gender
 * @property string $phone_no
 * @property string|null $email
 * @property string $student_aadhaar_no
 * @property int $general_category_id
 * @property string $father_name
 * @property string $father_occupation
 * @property string $father_annual_income
 * @property string $mother_name
 * @property string $mother_occupation
 * @property string $mother_annual_income
 * @property string $parent_phone
 * @property string|null $parent_alt_phone
 * @property int $present_address
 * @property int $present_district_id
 * @property int $present_state_id
 * @property int $present_pincode_id
 * @property int $permanent_address
 * @property int $permanent_district_id
 * @property int $permanent_state_id
 * @property int $permanent_pincode_id
 * @property string $previous_school_name
 * @property string $previous_school_board
 * @property string $payment_upload
 * @property string $record_status
 */
class ConceptRegistration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'concept_registration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['session_id', 'application_date', 'student_name', 'dob', 'age', 'gender', 'phone_no', 'student_aadhaar_no', 'general_category_id', 'father_name', 'father_occupation', 'father_annual_income', 'mother_name', 'mother_occupation', 'mother_annual_income', 'parent_phone', 'present_address', 'present_district_id', 'present_state_id', 'present_pincode', 'permanent_address', 'permanent_district_id', 'permanent_state_id', 'permanent_pincode', 'previous_school_name', 'previous_school_board', 'payment_upload'], 'required'],
            [['session_id', 'general_category_id', 'present_district_id', 'present_state_id', 'permanent_district_id', 'permanent_state_id'], 'integer'],
            [['application_date', 'dob'], 'safe'],
            [['gender'], 'string'],
            [['student_name', 'father_name', 'father_occupation', 'father_annual_income', 'mother_name', 'mother_occupation', 'mother_annual_income', 'permanent_address', 'present_address'], 'string', 'max' => 255],
            [['age'], 'string', 'max' => 50],
            [['phone_no', 'parent_phone', 'parent_alt_phone'], 'string', 'max' => 10],
            [['email'], 'string', 'max' => 100],
            [['student_aadhaar_no'], 'string', 'max' => 12],
            [['previous_school_name', 'previous_school_board'], 'string', 'max' => 200],
            [['payment_upload'], 'string', 'max' => 60],
            [['record_status'], 'string', 'max' => 1],
            [['permanent_pincode', 'present_pincode'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'session_id' => 'Session ID',
            'application_date' => 'Application Date',
            'student_name' => 'Student Name',
            'dob' => 'Dob',
            'age' => 'Age',
            'gender' => 'Gender',
            'phone_no' => 'Phone No',
            'email' => 'Email',
            'student_aadhaar_no' => 'Student Aadhaar No',
            'general_category_id' => 'General Category ID',
            'father_name' => 'Father Name',
            'father_occupation' => 'Father Occupation',
            'father_annual_income' => 'Father Annual Income',
            'mother_name' => 'Mother Name',
            'mother_occupation' => 'Mother Occupation',
            'mother_annual_income' => 'Mother Annual Income',
            'parent_phone' => 'Parent Phone',
            'parent_alt_phone' => 'Parent Alt Phone',
            'present_address' => 'Present Address',
            'present_district_id' => 'Present District ID',
            'present_state_id' => 'Present State ID',
            'present_pincode_id' => 'Present Pincode ID',
            'permanent_address' => 'Permanent Address',
            'permanent_district_id' => 'Permanent District ID',
            'permanent_state_id' => 'Permanent State ID',
            'permanent_pincode_id' => 'Permanent Pincode ID',
            'previous_school_name' => 'Previous School Name',
            'previous_school_board' => 'Previous School Board',
            'payment_upload' => 'Payment Upload',
            'record_status' => 'Record Status',
        ];
    }
}
