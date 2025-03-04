<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "contact_us".
 *
 * @property int $id
 * @property string $date
 * @property string $fullname
 * @property string $phone
 * @property string|null $email
 * @property string $message
 * @property string $record_status
 */
class ContactUs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_us';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'fullname', 'phone', 'message'], 'required'],
            [['date'], 'safe'],
            [['message'], 'string'],
            [['fullname'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 10],
            [['email'], 'string', 'max' => 50],
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
            'date' => 'Date',
            'fullname' => 'Fullname',
            'phone' => 'Phone',
            'email' => 'Email',
            'message' => 'Message',
            'record_status' => 'Record Status',
        ];
    }
}
