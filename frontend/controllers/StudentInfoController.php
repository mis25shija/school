<?php

namespace frontend\controllers;

use app\models\StudentInfo;
use app\models\StudentInfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Model;
use yii\web\Response;
use yii;
use app\models\StudentInformation;
use yii\data\ActiveDataProvider;   
/**
 * StudentInfoController implements the CRUD actions for StudentInfo model.
 */
class StudentInfoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['*'],
                'rules' => [
                    // [
                    //     'actions' => ['signup'],
                    //     'allow' => true,
                    //     'roles' => ['?'],
                    // ],
                    // [
                    //     'actions' => ['logout'],
                    //     'allow' => true,
                    //     'roles' => ['@'],
                    // ],

                    [

                        'allow' => true,

                        'actions' => ['login'],

                        'roles' => ['?'],

                    ],
                    [

                        'allow' => true,

                        // 'actions' => ['login'],

                        'roles' => ['@'],

                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all StudentInfo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StudentInfoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCheck()
    {
        $model = new StudentInfo();

        if($model->load(Yii::$app->request->queryParams)) {

            

            if (empty($model->class) && empty($model->name)) {

               $dataProvider = NULL;
            }else{

                $query = StudentInfo::find()->FilterWhere(['course_id'=>$model->class])->andFilterWhere(['LIKE','stud_name',$model->name]);

                $dataProvider = new ActiveDataProvider([

                    'query' => $query,
                    'sort'=> ['defaultOrder' => ['id' => SORT_DESC]],
                    'pagination' => array('pageSize' => 10),

                ]);

            }

            $class = $model->class;
            $name = $model->name;
            

            $details = StudentInfo::find()->where(['course_id'=>$class])->andWhere(['LIKE','stud_name',$name])->all();

            
            // echo "<pre>";print_r($c);die;    

            return $this->render('check', [

                'details' => $details,

                'model' => $model,

                'dataProvider' => $dataProvider,

            ]);

        }

        return $this->render('check', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single StudentInfo model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new StudentInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new StudentInfo();

        $modelitem = [new StudentInformation()];

        if ($model->load(Yii::$app->request->post()) ) {

            $model->stud_name = strtoupper($model->stud_name);

            

            $model->created_by = Yii::$app->user->id;

            if ($model->save(false)) {

                if ($model->have_sibling == 'YES') {
                   
               

                $modelitem = Model::createMultiple(StudentInformation::classname());
                Model::loadMultiple($modelitem, Yii::$app->request->post());

                $transaction = \Yii::$app->db->beginTransaction();
                try {
                        foreach ($modelitem as $sta) {

                            $mod = new StudentInfo();
                            $mod->stud_name = strtoupper($sta->name);
                            $mod->course_id = $sta->class;
                            $mod->gender = $sta->gen;
                            $mod->stud_dob = $sta->dob;
                            $mod->blood_group = $sta->b_grp;
                            $mod->stud_email = $sta->email;
                            $mod->stud_aadhaar_no = $sta->aadhaar;
                            $mod->std_id_mark = $sta->i_mark;
                            $mod->mother_tongue = $sta->m_tongue;
                            $mod->religion_id = $sta->rel_id;
                            $mod->student_category_id = $sta->s_cat_id;
                            $mod->general_category_id = $sta->g_cat_id;
                            $mod->nationality = $sta->national;

                            $mod->session_id = $model->session_id;
                            $mod->adm_date = $model->adm_date;
                            $mod->father_name = $model->father_name;
                            $mod->father_occupation = $model->father_occupation;
                            $mod->father_annual_income = $model->father_annual_income;
                            $mod->mother_name = $model->mother_name;
                            $mod->mother_occupation = $model->mother_occupation;
                            $mod->mother_annual_income = $model->mother_annual_income;
                            $mod->parent_phone = $model->parent_phone;
                            $mod->parent_alt_phone = $model->parent_alt_phone;

                            $mod->present_address = $model->present_address;
                            $mod->present_pincode = $model->present_pincode;
                            $mod->present_district_id = $model->present_district_id;
                            $mod->present_state_id = $model->present_state_id;
                            $mod->permanent_address = $model->permanent_address;
                            $mod->permanent_pincode = $model->permanent_pincode;
                            $mod->permanent_district_id = $model->permanent_district_id;
                            $mod->permanent_state_id = $model->permanent_state_id;
                            $mod->have_sibling = 'YES';
                            $mod->sibling_id = $model->id;
                           
                            $mod->created_by = Yii::$app->user->id;
                            $flag = $mod->save(false);
                            
                        }
                  
                    if ($flag) {
                         // die('2');
                        

                        $update = StudentInfo::find()->where(['id'=>$model->id])->one();

                        $update->sibling_id = $model->id;

                        if ($update->save()) {
                            $transaction->commit();
                            Yii::$app->session->setFlash('success', 'Successully added including siblings !');
                            return $this->redirect(Yii::$app->request->referrer);

                        }else{

                            $transaction->rollBack();
                            Yii::$app->session->setFlash('error', 'Failed to save !');
                            return $this->redirect(Yii::$app->request->referrer);

                        }

                        
                    }else{

                            $transaction->rollBack();
                            Yii::$app->session->setFlash('error', 'Failed to add !');
                            return $this->redirect(Yii::$app->request->referrer);
                    
                         }

                    } catch (Exception $e) {
                        // die('1');
                        $transaction->rollBack();
                    }

                }else{

                    // die('1');
                    Yii::$app->session->setFlash('success', 'Successfully added !');
                    return $this->redirect(Yii::$app->request->referrer);

                }
                
            }else{

                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'Failed to add !');
                return $this->redirect(Yii::$app->request->referrer);
            }

        

        }

        return $this->render('create', [
            'model' => $model,
            'modelitem' => $modelitem,
        ]);
    }

    /**
     * Updates an existing StudentInfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StudentInfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StudentInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return StudentInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StudentInfo::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
