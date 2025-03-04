<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "website_staff_display".
 *
 * @property int $id
 * @property string $staff_name
 * @property string $staff_photo
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class WebsiteStaffDisplay extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'website_staff_display';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staff_name', 'staff_photo', 'created_by'], 'required'],
            [['created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['staff_name', 'staff_photo'], 'string', 'max' => 255],
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
            'staff_name' => 'Staff Name',
            'staff_photo' => 'Staff Photo',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
