<?php

namespace frontend\controllers;

use app\models\District;
use app\models\DistrictSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use app\models\GeneralCategory;
use app\models\GeneralCategorySearch;
use app\models\WeekDays;
use app\models\WeekDaysSearch;
use app\models\Religion;
use app\models\ReligionSearch;
use app\models\StudentCategory;
use app\models\StudentCategorySearch;
use app\models\State;
use app\models\StateSearch;
/**
 * DistrictController implements the CRUD actions for District model.
 */
class DistrictController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all District models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new District();
        $modelcat = new GeneralCategory();
        $modelweek = new WeekDays();
        $modelrel = new Religion();
        $modelstud = new StudentCategory();
        $modelstate = new State();

        $searchModel = new DistrictSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $searchModelCat = new GeneralCategorySearch();
        $dataProviderCat = $searchModelCat->search($this->request->queryParams);

        $searchModelWeek = new WeekDaysSearch();
        $dataProviderWeek = $searchModelWeek->search($this->request->queryParams);

        $searchModelReligion = new ReligionSearch();
        $dataProviderReligion = $searchModelReligion->search($this->request->queryParams);

        $searchModelStud = new StudentCategorySearch();
        $dataProviderStud = $searchModelStud->search($this->request->queryParams);

        $searchModelState = new StateSearch();
        $dataProviderState = $searchModelState->search($this->request->queryParams);



        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {


                $chk = District::find()->where(['district_name' => $model->district_name])->one();

                if ($chk) {

                    Yii::$app->session->setflash('error', 'Record already present !');
                    return $this->redirect(Yii::$app->request->referrer);
                }
            
                $model->district_name = strtoupper($model->district_name);
                $model->created_by = Yii::$app->user->id;
            

            if($model->save()){
                
                Yii::$app->session->setflash('success', 'Record Successfully Added !');
                return $this->redirect(Yii::$app->request->referrer);
            } else{
                
                
                Yii::$app->session->setflash('error', 'Failed to add record!');
                return $this->redirect(Yii::$app->request->referrer);
            }
        }

        if ($modelcat->load(Yii::$app->request->post())) {


                $chk = GeneralCategory::find()->where(['g_cat_name' => $modelcat->g_cat_name])->one();

                if ($chk) {

                    Yii::$app->session->setflash('error', 'Record already present !');
                    return $this->redirect(Yii::$app->request->referrer);
                }
            
                $modelcat->g_cat_name = strtoupper($modelcat->g_cat_name);
                $modelcat->created_by = Yii::$app->user->id;
            

            if($modelcat->save()){
                
                Yii::$app->session->setflash('success', 'Record Successfully Added !');
                return $this->redirect(Yii::$app->request->referrer);
            } else{
                
                
                Yii::$app->session->setflash('error', 'Failed to add record!');
                return $this->redirect(Yii::$app->request->referrer);
            }
        }




        if ($modelweek->load(Yii::$app->request->post())) {


                $chk = WeekDays::find()->where(['day_name' => $modelweek->day_name])->one();

                if ($chk) {

                    Yii::$app->session->setflash('error', 'Record already present !');
                    return $this->redirect(Yii::$app->request->referrer);
                }
            
                $modelweek->day_name = strtoupper($modelweek->day_name);
                $modelweek->created_by = Yii::$app->user->id;
            

            if($modelweek->save()){
                
                Yii::$app->session->setflash('success', 'Record Successfully Added !');
                return $this->redirect(Yii::$app->request->referrer);
            } else{
                
                
                Yii::$app->session->setflash('error', 'Failed to add record!');
                return $this->redirect(Yii::$app->request->referrer);
            }
        }


        if ($modelrel->load(Yii::$app->request->post())) {


                $chk = Religion::find()->where(['religion_name' => $modelrel->religion_name])->one();

                if ($chk) {

                    Yii::$app->session->setflash('error', 'Record already present !');
                    return $this->redirect(Yii::$app->request->referrer);
                }
            
                $modelrel->religion_name = strtoupper($modelrel->religion_name);
                $modelrel->created_by = Yii::$app->user->id;
            

            if($modelrel->save()){
                
                Yii::$app->session->setflash('success', 'Record Successfully Added !');
                return $this->redirect(Yii::$app->request->referrer);
            } else{
                
                
                Yii::$app->session->setflash('error', 'Failed to add record!');
                return $this->redirect(Yii::$app->request->referrer);
            }
        }

        if ($modelstud->load(Yii::$app->request->post())) {


                $chk = StudentCategory::find()->where(['s_cat_name' => $modelstud->s_cat_name])->one();

                if ($chk) {

                    Yii::$app->session->setflash('error', 'Record already present !');
                    return $this->redirect(Yii::$app->request->referrer);
                }
            
                $modelstud->s_cat_name = strtoupper($modelstud->s_cat_name);
                $modelstud->created_by = Yii::$app->user->id;
            

            if($modelstud->save()){
                
                Yii::$app->session->setflash('success', 'Record Successfully Added !');
                return $this->redirect(Yii::$app->request->referrer);
            } else{
                
                
                Yii::$app->session->setflash('error', 'Failed to add record!');
                return $this->redirect(Yii::$app->request->referrer);
            }
        }

        if ($modelstate->load(Yii::$app->request->post())) {


                $chk = State::find()->where(['state_name' => $modelstate->state_name])->one();

                if ($chk) {

                    Yii::$app->session->setflash('error', 'Record already present !');
                    return $this->redirect(Yii::$app->request->referrer);
                }
            
                $modelstate->state_name = strtoupper($modelstate->state_name);
                $modelstate->created_by = Yii::$app->user->id;
            

            if($modelstate->save()){
                
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
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModelCat' => $searchModelCat,
            'dataProviderCat' => $dataProviderCat,
            'searchModelWeek' => $searchModelWeek,
            'dataProviderWeek' => $dataProviderWeek,
            'searchModelReligion' => $searchModelReligion,
            'dataProviderReligion' => $dataProviderReligion,
            'searchModelStud' => $searchModelStud,
            'dataProviderStud' => $dataProviderStud,
            'searchModelState' => $searchModelState,
            'dataProviderState' => $dataProviderState,
            'model' => $model,
            'modelcat' => $modelcat,
            'modelweek' => $modelweek,
            'modelrel' => $modelrel,
            'modelstud' => $modelstud,
            'modelstate' => $modelstate,
        ]);
    }

    /**
     * Displays a single District model.
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
     * Creates a new District model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new District();

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
     * Updates an existing District model.
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
     * Deletes an existing District model.
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
     * Finds the District model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return District the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = District::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
