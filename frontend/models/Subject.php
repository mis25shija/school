<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property string $subject_name
 * @property int $class_info_id
 * @property string $optional
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_name', 'class_info_id','sub_code','subject_type','created_by','optional'], 'required'],
            [['class_info_id', 'created_by', 'updated_by'], 'integer'],
            [['optional','subject_type'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['subject_name'], 'string', 'max' => 255],
            [['sub_code'], 'string', 'max' => 10],
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
            'subject_name' => 'Subject Name',
            'class_info_id' => 'Class Info ID',
            'optional' => 'Optional',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
            'subject_type' => 'Subject Type',
            'sub_code' => 'Subject Code',
        ];
    }
}
