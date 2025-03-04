<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "school_features".
 *
 * @property int $id
 * @property string $icon
 * @property string $title
 * @property string $content
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class SchoolFeatures extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'school_features';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['icon', 'title', 'content', 'created_by'], 'required'],
            [['created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['icon', 'title', 'content'], 'string', 'max' => 255],
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
            'icon' => 'Icon',
            'title' => 'Title',
            'content' => 'Content',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
