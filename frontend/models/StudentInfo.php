<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_info".
 *
 * @property int $id
 * @property string $auth_key
 * @property string $password_hash
 * @property string $std_adm_no
 * @property string $adm_date
 * @property string $stud_name
 * @property string $stud_photo
 * @property string $stud_dob
 * @property string $gender
 * @property string|null $stud_email
 * @property string $stud_aadhaar_no
 * @property string|null $std_id_mark
 * @property int $course_id
 * @property int $session_id
 * @property int|null $section_id
 * @property int $student_category_id
 * @property int $general_category_id
 * @property int|null $religion_id
 * @property string|null $blood_group
 * @property string|null $mother_tongue
 * @property string|null $nationality
 * @property int|null $roll_no
 * @property string $father_name
 * @property string $father_occupation
 * @property string|null $father_annual_income
 * @property string $mother_name
 * @property string|null $mother_occupation
 * @property string|null $mother_annual_income
 * @property string $parent_phone
 * @property string|null $parent_alt_phone
 * @property string $permanent_address
 * @property string $permanent_pincode
 * @property int $permanent_district_id
 * @property int $permanent_state_id
 * @property string|null $present_address
 * @property string|null $present_pincode
 * @property int $present_district_id
 * @property int $present_state_id
 * @property string $have_sibling
 * @property int|null $sibling_id
 * @property string $stud_type
 * @property string $admission_status
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class StudentInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_info';
    }

    public $photo,$name,$dob,$gen,$email,$aadhaar,$b_grp,$i_mark,$m_tongue,$rel_id,$s_cat_id,$g_cat_id,$national,$s_img,$class;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['adm_date', 'stud_name', 'stud_dob', 'gender', 'stud_aadhaar_no', 'course_id', 'session_id', 'student_category_id', 'general_category_id', 'father_name', 'father_occupation', 'mother_name', 'parent_phone', 'permanent_address', 'permanent_pincode', 'permanent_district_id', 'permanent_state_id', 'present_district_id', 'present_state_id', 'have_sibling', 'created_by', 'religion_id', 'present_address', 'present_pincode'], 'required'],
            [['adm_date', 'stud_dob','dob','created_date', 'updated_date'], 'safe'],
            [['gender','gen','blood_group','b_grp', 'permanent_address', 'present_address', 'have_sibling', 'stud_type', 'admission_status'], 'string'],
            [['course_id','class', 'session_id', 'section_id', 'student_category_id','s_cat_id','g_cat_id', 'general_category_id', 'religion_id','rel_id', 'roll_no', 'permanent_district_id', 'permanent_state_id', 'present_district_id', 'present_state_id', 'sibling_id', 'created_by', 'updated_by'], 'integer'],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'std_adm_no','name', 'stud_name', 'stud_photo', 'std_id_mark','i_mark', 'mother_tongue','m_tongue', 'nationality','national', 'father_name', 'mother_name'], 'string', 'max' => 255],
            [['stud_email','email'], 'string', 'max' => 50],
            [['stud_aadhaar_no','aadhaar'], 'string', 'max' => 12],
            [['father_occupation', 'mother_occupation'], 'string', 'max' => 100],
            [['father_annual_income', 'mother_annual_income'], 'string', 'max' => 70],
            [['parent_phone', 'parent_alt_phone'], 'string', 'max' => 10],
            [['permanent_pincode', 'present_pincode'], 'string', 'max' => 6],
            [['record_status'], 'string', 'max' => 1],
            [['s_img','photo'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 100 * 1024]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'std_adm_no' => 'Student Admission No',
            'adm_date' => 'Admission Date',
            'stud_name' => 'Student Name',
            'stud_photo' => 'Stud Photo',
            'stud_dob' => 'Date of birth',
            'gender' => 'Gender',
            'stud_email' => 'Student Email',
            'stud_aadhaar_no' => 'Student Aadhaar No',
            'std_id_mark' => 'Student Identification Mark',
            'course_id' => 'Class',
            'session_id' => 'Academic Session',
            'section_id' => 'Section ',
            'student_category_id' => 'Student Category',
            'general_category_id' => 'Social Category',
            'religion_id' => 'Religion',
            'blood_group' => 'Blood Group',
            'mother_tongue' => 'Mother Tongue',
            'nationality' => 'Nationality',
            'roll_no' => 'Roll No',
            'father_name' => 'Father Name',
            'father_occupation' => 'Father Occupation',
            'father_annual_income' => 'Father Annual Income',
            'mother_name' => 'Mother Name',
            'mother_occupation' => 'Mother Occupation',
            'mother_annual_income' => 'Mother Annual Income',
            'parent_phone' => 'Parent Phone',
            'parent_alt_phone' => 'Parent Alt Phone',
            'permanent_address' => 'Permanent Address',
            'permanent_pincode' => 'Permanent Pincode',
            'permanent_district_id' => 'Permanent District ',
            'permanent_state_id' => 'Permanent State ',
            'present_address' => 'Present Address',
            'present_pincode' => 'Present Pincode',
            'present_district_id' => 'Present District ',
            'present_state_id' => 'Present State',
            'have_sibling' => 'Have Sibling',
            'sibling_id' => 'Sibling ID',
            'stud_type' => 'Stud Type',
            'admission_status' => 'Admission Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }
}
