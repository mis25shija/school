<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SchoolDetail;

/**
 * SchoolDetailSearch represents the model behind the search form of `app\models\SchoolDetail`.
 */
class SchoolDetailSearch extends SchoolDetail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by', 'updated_date'], 'integer'],
            [['school_name', 'school_photo', 'school_address', 'school_phone', 'school_alt_phone', 'cut_off_attendence', 'reg_no_prefix', 'admission_no_prefix', 'receipt_prefix', 'created_date', 'record_status'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SchoolDetail::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'school_name', $this->school_name])
            ->andFilterWhere(['like', 'school_photo', $this->school_photo])
            ->andFilterWhere(['like', 'school_address', $this->school_address])
            ->andFilterWhere(['like', 'school_phone', $this->school_phone])
            ->andFilterWhere(['like', 'school_alt_phone', $this->school_alt_phone])
            ->andFilterWhere(['like', 'cut_off_attendence', $this->cut_off_attendence])
            ->andFilterWhere(['like', 'reg_no_prefix', $this->reg_no_prefix])
            ->andFilterWhere(['like', 'admission_no_prefix', $this->admission_no_prefix])
            ->andFilterWhere(['like', 'receipt_prefix', $this->receipt_prefix])
            ->andFilterWhere(['like', 'record_status', $this->record_status]);

        return $dataProvider;
    }
}
