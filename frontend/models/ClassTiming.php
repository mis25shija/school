<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "class_timing".
 *
 * @property int $id
 * @property string $class_timing_name
 * @property string $start_time
 * @property string $end_time
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class ClassTiming extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'class_timing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_timing_name', 'created_by','start_time', 'end_time'], 'required'],
            [['start_time', 'end_time', 'created_date', 'updated_date'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['class_timing_name'], 'string', 'max' => 255],
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
            'class_timing_name' => 'Class Timing Name',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }
}
