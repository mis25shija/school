<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "general_category".
 *
 * @property int $id
 * @property string $g_cat_name
 * @property string $g_description
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class GeneralCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'general_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['g_cat_name', 'g_description', 'created_by'], 'required'],
            [['g_description'], 'string'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['g_cat_name'], 'string', 'max' => 255],
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
            'g_cat_name' => 'Category Name',
            'g_description' => 'Description',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }
}
