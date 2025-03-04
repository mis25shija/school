<?php

namespace frontend\controllers;

use app\models\StudentAdmParticular;
use app\models\StudentAdmParticularSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use yii\filters\AccessControl;
use app\models\StudentInfo;
use app\models\StudentAdmInfo;
use app\models\StudentAdmInfoSearch;
use app\models\ParticularPrint;
use app\models\SchoolDetail;
use app\models\AcademicSession;
/**
 * StudentAdmParticularController implements the CRUD actions for StudentAdmParticular model.
 */
class StudentAdmParticularController extends Controller
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
     * Lists all StudentAdmParticular models.
     *
     * @return string
     */
    public function actionIndex($id)
    {
        $session = AcademicSession::find()->where(['active_status'=>'1'])->one();

        $searchModel = new StudentAdmParticularSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andFilterWhere(['student_id'=>$id])->andFilterWhere(['session_id'=>$session->id])->andFilterWhere(['record_status'=>'1']);

        $searchModel1 = new StudentAdmInfoSearch();
        $dataProvider1 = $searchModel1->search($this->request->queryParams);
        $dataProvider1->query->andFilterWhere(['student_id'=>$id])->andFilterWhere(['session_id'=>$session->id])->andFilterWhere(['record_status'=>'1'])
        ;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel1' => $searchModel1,
            'dataProvider1' => $dataProvider1,
            'id' => $id,
        ]);
    }

    /**
     * Displays a single StudentAdmParticular model.
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

    public function actionParprint()
    {

        if($selection=(array)Yii::$app->request->post('selection'))
        {

            // echo "<pre>";print_r($selection);die;
            if(Yii::$app->request->post()) {
                $list= StudentAdmParticular::find()->asArray()->select('id,student_id,particular_name,price,due_amount')->where(['id'=>$selection])->all();
                

                $stud_id = $list[0]['student_id'];
                // echo "<pre>";print_r($cus_id);die;

                if($_POST['submit'] == 'print') {
                    return $this->redirect(['student-adm-particular/print','list' => json_encode($list),'id'=>$stud_id]);
                }
                else{
                     return $this->redirect(Yii::$app->request->referrer);
                }
                
            }
            
        }
        else
        {

            Yii::$app->session->setFlash('error', "Your have not selected any row");
            return $this->redirect(Yii::$app->request->referrer);
        }

       
    }


    public function actionPrint($list,$id)
    {
        $li = json_decode($list);
        // $cus_id = $li[0]['customer_id'];
        // $cus_id = $li->customer_id;
        // echo "<pre>"; print_r($li);die;


        $model = new StudentAdmParticular();

        $part = new ParticularPrint();

        if($part->load(Yii::$app->request->post())) {
                $school = SchoolDetail::find()->one();
                $date = date('Y-m-d');
                $part->student_id = $id;
                $part->print_date = $date;
                $part->invoice = $school->reg_no_prefix."/PAR/".$date."/".$part->id;
                // $model->created_by = Yii::$app->user->id;
                
                // "<pre>";print_r($model->errors);die;
                if($part->save()){
                    
                    Yii::$app->session->setflash('success', 'Successfully !');
                    return $this->redirect(Yii::$app->request->referrer);
                } else{
                    
                    // "<pre>";print_r($model->errors);die;
                    Yii::$app->session->setflash('error', 'Failed!');
                    return $this->redirect(Yii::$app->request->referrer);
                }


        }
        
        

        return $this->renderAjax('print',
                            [
                                'id' => $id,
                                'li' => $li,
                            ]);
        
    }

    public function actionAdmprint($id)
    {

        $model = StudentInfo::find()->where(['id'=>$id])->one();
        $admfee = StudentAdmInfo::find()->where(['student_id'=>$id])->one();
        
        return $this->renderAjax('admprint',
                            [
                                'id' => $id,
                                'model' => $model,
                                'admfee' => $admfee,
                            ]);
        
    }

    /**
     * Creates a new StudentAdmParticular model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new StudentAdmParticular();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing StudentAdmParticular model.
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

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StudentAdmParticular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->record_status = '0';

        if($model->save()){
                    
            Yii::$app->session->setflash('error', 'Record Deleted !');
            return $this->redirect(Yii::$app->request->referrer);
        } else{
            
            // "<pre>";print_r($model->errors);die;
            Yii::$app->session->setflash('error', 'Fail to delete !');
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the StudentAdmParticular model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return StudentAdmParticular the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StudentAdmParticular::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
