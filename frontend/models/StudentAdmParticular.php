<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_adm_particular".
 *
 * @property int $id
 * @property int $student_id
 * @property int $student_adm_info_id
 * @property string $particular_name
 * @property float $price
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class StudentAdmParticular extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_adm_particular';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id',  'particular_name', 'price', 'created_by','session_id'], 'required'],
            [['student_id',  'created_by','session_id'], 'integer'],
            [['price','due_amount'], 'number'],
            [['created_date'], 'safe'],
            [['particular_name'], 'string', 'max' => 255],
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
            'student_id' => 'Student ID',
            'student_adm_info_id' => 'Student Adm Info ID',
            'particular_name' => 'Particular Name',
            'price' => 'Amount Paid',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
            'due_amount' => 'Due Amount',
            'session_id' => 'Session',

        ];
    }
}
