<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "about_school".
 *
 * @property int $id
 * @property string $heading
 * @property string $body
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class AboutSchool extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about_school';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['heading', 'body', 'created_by'], 'required'],
            [['body'], 'string'],
            [['created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['heading'], 'string', 'max' => 255],
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
            'heading' => 'Heading',
            'body' => 'Body',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
