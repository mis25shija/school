<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "section".
 *
 * @property int $id
 * @property int $class_info_id
 * @property string $section_name
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_info_id', 'section_name', 'created_by'], 'required'],
            [['class_info_id', 'created_by', 'updated_by'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['section_name'], 'string', 'max' => 40],
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
            'class_info_id' => 'Class',
            'section_name' => 'Section Name',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }
}
