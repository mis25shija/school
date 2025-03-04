<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "achievement".
 *
 * @property int $id
 * @property string $photo
 * @property string $achievement_info
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class Achievement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'achievement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photo', 'achievement_info', 'created_by'], 'required'],
            [['achievement_info'], 'string'],
            [['created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['photo'], 'string', 'max' => 255],
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
            'photo' => 'Photo',
            'achievement_info' => 'Achievement Info',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
