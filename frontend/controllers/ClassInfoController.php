<?php

namespace frontend\controllers;

use app\models\ClassInfo;
use app\models\ClassInfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use app\models\AcademicSession;
use app\models\AcademicSessionSearch;
use app\models\Section;
use app\models\SectionSearch;
use app\models\Subject;
use app\models\SubjectSearch;
use app\models\ClassTiming;
use app\models\ClassTimingSearch;
use app\models\SchoolHoliday;
use app\models\SchoolHolidaySearch;
use yii\filters\AccessControl;
/**
 * ClassInfoController implements the CRUD actions for ClassInfo model.
 */
class ClassInfoController extends Controller
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
     * Lists all ClassInfo models.
     *
     * @return string
     */
    public function actionIndex() 
    {
        $model = new ClassInfo();
        $searchModel = new ClassInfoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $modelsec = new Section();
        $searchModelSec = new SectionSearch();
        $dataProviderSec = $searchModelSec->search($this->request->queryParams);

        $modelsub = new Subject();
        $searchModelSub = new SubjectSearch();
        $dataProviderSub = $searchModelSub->search($this->request->queryParams);

        $modeltime = new ClassTiming();
        $searchModelTime = new ClassTimingSearch();
        $dataProviderTime = $searchModelTime->search($this->request->queryParams);

        $modelholiday = new SchoolHoliday();
        $searchModelHoliday = new SchoolHolidaySearch();
        $dataProviderHoliday = $searchModelHoliday->search($this->request->queryParams);

        if ($this->request->isPost) {

        if ($model->load(Yii::$app->request->post())) {

            $chk = ClassInfo::find()->where(['class_name'=>$model->class_name])->one();

            if ($chk) {
                Yii::$app->session->setflash('error', 'Record already exists!');
                return $this->redirect(Yii::$app->request->referrer);
            }

            $model->created_by = Yii::$app->user->id;   
            if($model->save()){
                
                Yii::$app->session->setflash('success', 'Record Successfully Added !');
                return $this->redirect(Yii::$app->request->referrer);
            } else{
                
                
                Yii::$app->session->setflash('error', 'Failed to add record!');
                return $this->redirect(Yii::$app->request->referrer);
            }
        }

        if ($modelsec->load(Yii::$app->request->post())) {

            $chk = Section::find()->where(['class_info_id'=>$modelsec->class_info_id])->andwhere(['section_name'=>$modelsec->section_name])->one();

            if ($chk) {
                Yii::$app->session->setflash('error', 'Record already exists!');
                return $this->redirect(Yii::$app->request->referrer);
            }

            $modelsec->section_name = strtoupper($modelsec->section_name);
            $modelsec->created_by = Yii::$app->user->id;   
            if($modelsec->save()){
                
                Yii::$app->session->setflash('success', 'Record Successfully Added !');
                return $this->redirect(Yii::$app->request->referrer);
            } else{
                
                
                Yii::$app->session->setflash('error', 'Failed to add record!');
                return $this->redirect(Yii::$app->request->referrer);
            }
        }

        if ($modelsub->load(Yii::$app->request->post())) {

            $chk = Subject::find()->where(['class_info_id'=>$modelsub->class_info_id])->andwhere(['subject_name'=>$modelsub->subject_name])->one();

            if ($chk) {
                Yii::$app->session->setflash('error', 'Record already exists!');
                return $this->redirect(Yii::$app->request->referrer);
            }

            $modelsub->subject_name = strtoupper($modelsub->subject_name);
            $modelsub->created_by = Yii::$app->user->id;   
            if($modelsub->save()){
                
                Yii::$app->session->setflash('success', 'Record Successfully Added !');
                return $this->redirect(Yii::$app->request->referrer);
            } else{
                
                
                Yii::$app->session->setflash('error', 'Failed to add record!');
                return $this->redirect(Yii::$app->request->referrer);
            }
        }

        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
            'model' => $model,
            'modelsec' => $modelsec,
            'modelsub' => $modelsub,
            'modeltime' => $modeltime,
            'modelholiday' => $modelholiday,

            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModelSec' => $searchModelSec,
            'dataProviderSec' => $dataProviderSec,
            'searchModelSub' => $searchModelSub,
            'dataProviderSub' => $dataProviderSub,
            'searchModelTime' => $searchModelTime,
            'dataProviderTime' => $dataProviderTime,
            'searchModelHoliday' => $searchModelHoliday,
            'dataProviderHoliday' => $dataProviderHoliday,
        ]);
    }

    /**
     * Displays a single ClassInfo model.
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
     * Creates a new ClassInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ClassInfo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ClassInfo model.
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
     * Deletes an existing ClassInfo model.
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
     * Finds the ClassInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ClassInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClassInfo::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
