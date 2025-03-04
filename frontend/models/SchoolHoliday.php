<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school_holiday".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class SchoolHoliday extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'school_holiday';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'start_date', 'end_date', 'created_by'], 'required'],
            [['description'], 'string'],
            [['start_date', 'end_date', 'created_date', 'updated_date'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['title'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'description' => 'Description',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }
}
