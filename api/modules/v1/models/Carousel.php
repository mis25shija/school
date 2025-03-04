<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "carousel".
 *
 * @property int $id
 * @property string $title
 * @property string $web_image
 * @property string $mobile_image
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
            [['title', 'web_image', 'mobile_image', 'created_by','web'], 'required'],
            [['created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['title', 'web_image', 'mobile_image'], 'string', 'max' => 255],
            [['record_status'], 'string', 'max' => 1],
            [['web','mobile'],'file','extensions'=>'png,jpg,jpeg',],
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
            'web_image' => 'Web Image',
            'mobile_image' => 'Mobile Image',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
            'web' => 'Web Banner',
        ];
    }
}
