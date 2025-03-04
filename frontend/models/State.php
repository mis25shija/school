<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "state".
 *
 * @property int $id
 * @property string $state_name
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'state';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['state_name', 'created_by'], 'required'],
            [['created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['state_name'], 'string', 'max' => 255],
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
            'state_name' => 'State Name',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
