<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_adm_info".
 *
 * @property int $id
 * @property int $student_id
 * @property float $total_fee
 * @property float $discount
 * @property float $fine
 * @property float $payable_amount
 * @property float $amount_received
 * @property float $due_amount
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class StudentAdmInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_adm_info';
    }

    /**
     * {@inheritdoc}
     */
    public $s_type;
    public function rules()
    {
        return [
            [['student_id', 'total_fee', 'payable_amount', 'amount_received', 'created_by','payment_date','class_id','session_id','payment_type','payment_status','invoice'], 'required'],
            [['student_id', 'created_by', 'updated_by','class_id','session_id'], 'integer'],
            [['total_fee', 'discount', 'fine', 'payable_amount', 'amount_received', 'due_amount'], 'number'],
            [['created_date', 'updated_date','payment_date'], 'safe'],
            [['record_status'], 'string', 'max' => 1],
            [['remark'], 'string', 'max' => 255],
            [['invoice'], 'string', 'max' => 60],
            [['s_type'], 'string'],
            [['payment_type','payment_status'], 'string'],
            
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
            'total_fee' => 'Total Fee',
            'discount' => 'Discount',
            'fine' => 'Fine',
            'payable_amount' => 'Payable Amount',
            'amount_received' => 'Amount Received',
            'due_amount' => 'Due Amount',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
            's_type' => 'Student Type',
            'class_id' => 'Class',
            'session_id' => 'Session',
            'payment_type' => 'Payment Type',
            'payment_status' => 'Payment Status',
            'remark' => 'Remark',
            'invoice' => 'Bill No',
        ];
    }
}
