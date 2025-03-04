<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "class_info".
 *
 * @property int $id
 * @property string $class_name
 * @property string $class_code
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class ClassInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'class_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_name', 'class_code', 'created_by'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['class_name'], 'string', 'max' => 255],
            [['class_code'], 'string', 'max' => 50],
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
            'class_name' => 'Class Name',
            'class_code' => 'Class Code',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }
}
