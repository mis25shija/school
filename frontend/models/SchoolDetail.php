<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school_detail".
 *
 * @property int $id
 * @property string $school_name
 * @property string $school_photo
 * @property string $school_address
 * @property string $school_phone
 * @property string|null $school_alt_phone
 * @property string $cut_off_attendence
 * @property string|null $reg_no_prefix
 * @property string|null $admission_no_prefix
 * @property string|null $receipt_prefix
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property int|null $updated_date
 * @property string $record_status
 */
class SchoolDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'school_detail';
    }

    public $simg;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['school_name', 'school_photo', 'school_address', 'school_phone', 'cut_off_attendence', 'created_by'], 'required'],
            [['school_address'], 'string'],
            [['created_by', 'updated_by', 'updated_date'], 'integer'],
            [['created_date'], 'safe'],
            [['school_name', 'school_photo'], 'string', 'max' => 255],
            [['school_phone', 'school_alt_phone', 'cut_off_attendence'], 'string', 'max' => 10],
            [['reg_no_prefix', 'admission_no_prefix', 'receipt_prefix'], 'string', 'max' => 5],
            [['record_status'], 'string', 'max' => 1],
            [['simg'],'file','extensions'=>'png,jpg,jpeg','maxSize'=>200*1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_name' => 'School Name',
            'school_photo' => 'School Photo',
            'school_address' => 'School Address',
            'school_phone' => 'School Phone',
            'school_alt_phone' => 'School Alt Phone',
            'cut_off_attendence' => 'Cut Off Attendence',
            'reg_no_prefix' => 'Reg No Prefix',
            'admission_no_prefix' => 'Admission No Prefix',
            'receipt_prefix' => 'Receipt Prefix',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }
}
