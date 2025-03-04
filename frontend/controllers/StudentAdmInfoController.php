<?php

namespace frontend\controllers;

use app\models\StudentAdmInfo;
use app\models\StudentAdmInfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii;
use app\models\StudentInfo;
use app\models\AdmissionFee;
use app\models\StudentAdmParticular;
use app\models\SchoolDetail;
use app\models\AcademicSession;
/**
 * StudentAdmInfoController implements the CRUD actions for StudentAdmInfo model.
 */
class StudentAdmInfoController extends Controller
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
     * Lists all StudentAdmInfo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StudentAdmInfoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StudentAdmInfo model.
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
     * Creates a new StudentAdmInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {

        $details = StudentInfo::find()->where(['id'=>$id])->one();

        $a_ses = AcademicSession::find()->where(['active_status'=>'1'])->one();

        $model = StudentAdmInfo::find()->where(['student_id' => $id])->andWhere(['session_id'=>$a_ses->id])->andWhere(['class_id'=>$details->course_id])->one();
        $update = true;
        if (!$model) {
           $model = new StudentAdmInfo(); 
           $update = false;
        }
            

        if ($this->request->isPost) {
                if ($model->load(Yii::$app->request->post())) {
                    $transaction = \Yii::$app->db->beginTransaction();
                    try {

                                $schl = SchoolDetail::find()->one();
                                $pre = $schl->receipt_prefix;
                                $model->invoice = $pre."/Admission/".date('d/m/Y',strtotime($model->payment_date)).$model->id;
                                $model->student_id = $id;
                                $model->created_by = Yii::$app->user->id;
                            

                            if($model->save()){
                                
                                    $details->stud_type = 'OLD-STUDENT';

                                    if ($model->due_amount > 0) {
                                        $details->admission_status = 'ADMITTED WITH DUE AMOUNT';
                                    }else{
                                        $details->admission_status = 'ADMITTED';
                                    }

                                    if ($details->save()) {
                                        $transaction->commit();
                                        Yii::$app->session->setflash('success', 'Record Successfully Added !');
                                        return $this->redirect(['student-adm-info/print', 'id' => $id]);
                                    }else{

                                        $transaction->rollBack();
                                        // echo "<pre>";print_r($model->errors);die;
                                        Yii::$app->session->setflash('error', 'Failed to add record!');
                                        return $this->redirect(Yii::$app->request->referrer);
                                    }
                                
                            } else{
                                $transaction->rollBack();
                                // echo "<pre>";print_r($model->errors);die;
                                Yii::$app->session->setflash('error', 'Failed to add record!');
                                return $this->redirect(Yii::$app->request->referrer);
                            }
                            
                        } catch (Exception $e) {
                            $transaction->rollBack();
                            Yii::$app->session->setFlash('error', 'An error occurred during update.');
                            return $this->redirect(Yii::$app->request->referrer);
                        }
            }

        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'id' => $id,
            'details' => $details,
            'update' => $update,

        ]);
    }


    public function actionPrint($id)
    {
        $details = StudentInfo::find()->where(['id'=>$id])->one();

        $chk1 = StudentAdmInfo::find()->where(['student_id' => $id])->one();
        if ($chk1) {
            
            $fee = $chk1;
        }else{

            $fee = NULL;
        }

        // echo "<pre>";print_r($fee);die;

        $chk2 = StudentAdmParticular::find()->where(['student_id' => $id])->exists();
        // echo "<pre>";print_r($id);die;
        if ($chk2) {
            
            $particular = StudentAdmParticular::find()->asArray()->where(['student_id' => $id])->all();
            // echo "<pre>";print_r($particular);die;
        }else{

            $particular = NULL;
        }
        

        return $this->renderAjax('print', [
    
            'details'=> $details,
            'fee'=> $fee,
            'particular'=> $particular,
        ]);
    }


    public function actionAmount($class,$stype,$date,$session)

    {

        // die('1');

        $price = AdmissionFee::find()->where(['class_info_id'=>$class])->andWhere(['session_id'=>$session])->one();

        $ldate = $price->adm_last_date;

        if ($price) {

            if ($stype == 'NEW-STUDENT') {

                $fee = $price->new_student_adm_fee;

            }else{

                $fee = $price->old_student_adm_fee;
            }

            if ($date > $ldate ) {

                $fine = $price->fine_amount;

            }else{

                $fine = 0;
            }

            $tfee = $fee + $fine;

            $data = ["fee"=>$fee,"tfee"=>$tfee,"fine"=>$fine];

            return json_encode($data);
            
        }else{

            return 0;
        }

        // "<pre>";print_r($id);die;

    }

    /**
     * Updates an existing StudentAdmInfo model.
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
     * Deletes an existing StudentAdmInfo model.
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
     * Finds the StudentAdmInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return StudentAdmInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StudentAdmInfo::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
