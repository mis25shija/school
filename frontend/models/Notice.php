<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notice".
 *
 * @property int $id
 * @property string $header
 * @property string $body
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class Notice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['header', 'body', 'created_by','notice_date'], 'required'],
            [['body'], 'string'],
            [['created_by'], 'integer'],
            [['created_date','notice_date'], 'safe'],
            [['header'], 'string', 'max' => 255],
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
            'header' => 'Header',
            'body' => 'Body',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
            'notice_date' => 'Notice Date',
        ];
    }
}
