<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "academic_session".
 *
 * @property int $id
 * @property string $session_name
 * @property int $class_info_id
 * @property string $session_start_date
 * @property string $session_end_date
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class AcademicSession extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'academic_session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['session_name', 'session_start_date', 'session_end_date', 'created_by'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['session_start_date', 'session_end_date', 'created_date', 'updated_date'], 'safe'],
            [['session_name'], 'string', 'max' => 255],
            [['record_status','active_status'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'session_name' => 'Session Name',
            
            'session_start_date' => 'Session Start Date',
            'session_end_date' => 'Session End Date',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
            'active_status' => 'Active Status',
        ];
    }
}
