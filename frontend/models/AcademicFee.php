<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "academic_fee".
 *
 * @property int $id
 * @property string $academic_fee_name
 * @property float $academic_fee_amount
 * @property int $class_info_id
 * @property int $session_id
 * @property float $fine_amount
 * @property string $fee_last_date
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class AcademicFee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'academic_fee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['academic_fee_name', 'academic_fee_amount', 'class_info_id', 'session_id', 'fine_amount', 'fee_last_date', 'created_by'], 'required'],
            [['academic_fee_amount', 'fine_amount'], 'number'],
            [['class_info_id', 'session_id', 'created_by', 'updated_by'], 'integer'],
            [['fee_last_date', 'created_date', 'updated_date'], 'safe'],
            [['academic_fee_name'], 'string', 'max' => 255],
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
            'academic_fee_name' => 'Fee Name',
            'academic_fee_amount' => 'Fee Amount (Rs)',
            'class_info_id' => 'Class',
            'session_id' => 'Session',
            'fine_amount' => 'Fine Amount (Rs)',
            'fee_last_date' => 'Last Date',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }
}
