<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admission_fee".
 *
 * @property int $id
 * @property float $new_student_adm_fee
 * @property float $old_student_adm_fee
 * @property int $class_info_id
 * @property int $session_id
 * @property float $fine_amount
 * @property string $adm_last_date
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class AdmissionFee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admission_fee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['new_student_adm_fee', 'old_student_adm_fee', 'class_info_id', 'session_id', 'fine_amount', 'adm_last_date', 'created_by'], 'required'],
            [['new_student_adm_fee', 'old_student_adm_fee', 'fine_amount'], 'number'],
            [['class_info_id', 'session_id', 'created_by', 'updated_by'], 'integer'],
            [['adm_last_date', 'created_date', 'updated_date'], 'safe'],
            [['record_status'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'new_student_adm_fee' => 'New Student Admission Fee',
            'old_student_adm_fee' => 'Old Student Admission Fee',
            'class_info_id' => 'Class',
            'session_id' => 'Session',
            'fine_amount' => 'Fine Amount',
            'adm_last_date' => 'Admission Last Date',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }
}
