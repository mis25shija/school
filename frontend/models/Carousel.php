<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carousel".
 *
 * @property int $id
 * @property string $desktop_format
 * @property string $mobile_format
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class Carousel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carousel';
    }

    /**
     * {@inheritdoc}
     */
    public $web,$mobile;
    public function rules()
    {
        return [
            [['desktop_format', 'mobile_format', 'created_by','web', 'mobile'], 'required'],
            [['created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['desktop_format', 'mobile_format'], 'string', 'max' => 255],
            [['record_status'], 'string', 'max' => 1],
            [['web', 'mobile'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 600 * 1024] // 600KB
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'desktop_format' => 'Desktop Format',
            'mobile_format' => 'Mobile Format',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
