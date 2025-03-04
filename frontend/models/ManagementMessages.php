<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "management_messages".
 *
 * @property int $id
 * @property string $photo
 * @property string $message_info
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class ManagementMessages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'management_messages';
    }

    /**
     * {@inheritdoc}
     */
    public $management;
    public function rules()
    {
        return [
            [['photo', 'message_info', 'created_by'], 'required'],
            [['message_info'], 'string'],
            [['created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['photo'], 'string', 'max' => 255],
            [['record_status'], 'string', 'max' => 1],
            [['management'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 600 * 1024] // 600KB
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
            'message_info' => 'Message Info',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
            'management' => 'Photo',
        ];
    }
}
