<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_category".
 *
 * @property int $id
 * @property string $s_cat_name
 * @property string $s_description
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class StudentCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['s_cat_name', 's_description', 'created_by'], 'required'],
            [['s_description'], 'string'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['s_cat_name'], 'string', 'max' => 255],
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
            's_cat_name' => 'S Cat Name',
            's_description' => 'S Description',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }
}
