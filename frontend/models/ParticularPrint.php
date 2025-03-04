<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "particular_print".
 *
 * @property int $id
 * @property int $student_id
 * @property string $invoice
 * @property string $print_date
 * @property string $record_status
 */
class ParticularPrint extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'particular_print';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'invoice', 'print_date'], 'required'],
            [['student_id'], 'integer'],
            [['print_date'], 'safe'],
            [['invoice'], 'string', 'max' => 70],
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
            'invoice' => 'Invoice',
            'print_date' => 'Print Date',
            'record_status' => 'Record Status',
        ];
    }
}
