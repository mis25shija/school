<?php



namespace api\modules\v1\controllers;



use Yii;

use yii\filters\Cors;

use yii\rest\ActiveController;

use api\modules\v1\models\Appversion;

use common\models\User;

use common\models\LoginForm;

use api\modules\v1\models\Carousel;

use api\modules\v1\models\AboutSchool;

use api\modules\v1\models\ManagementMessages;

use api\modules\v1\models\Notice;

use api\modules\v1\models\SchoolFeatures;

use api\modules\v1\models\WebsiteStaffDisplay;

use api\modules\v1\models\Achievement;

use api\modules\v1\models\ContactUs;

use api\modules\v1\models\ConceptRegistration;

use api\modules\v1\models\District;

use api\modules\v1\models\State;

use api\modules\v1\models\AcademicSession;

use api\modules\v1\models\GeneralCategory;

use yii\web\UploadedFile;

use yii\filters\VerbFilter;

// use api\modules\v1\models\Notification;



class MasterController extends ActiveController

{

    public function behaviors()

    {

        return [

            'corsFilter' => [

                'class' => \yii\filters\Cors::className(),

                'cors' => [

                    // restrict access to

                    // 'Origin' => ['*'],
                    'Origin' => ['http://10.10.13.177'],

                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'OPTIONS'],

                    // Allow only POST and PUT methods

                    // 'Access-Control-Request-Headers' => ['X-Wsse','X-CSRF-Token','X-CSRF','*'],
                    'Access-Control-Request-Headers' => ['*'], // Allow all headers

                    // Allow only headers 'X-Wsse'

                    'Access-Control-Allow-Credentials' => true,

                    // Allow OPTIONS caching

                    'Access-Control-Max-Age' => 3600,

                    // Allow the X-Pagination-Current-Page header to be exposed to the browser.

                    'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],

                ],

            ],

        ];

    }



public $modelClass = 'api\modules\v1\models\Appversion';




// banner image data send
public function actionSendbanner() { 



		$carousel = Carousel::find()->asArray()->select('id,desktop_format,mobile_format')

		->where(['record_status'=>'1'])->all();



		if($carousel){								



			$data = ['status'=>'success', 'msg'=>$carousel];



			}else{

				$data = ['status'=>'fail', 'msg'=>'List not found'];

			}

						
		return json_encode($data);

	}

	// send notice 
	public function actionNoticeboard() { 



		$notice = Notice::find()->asArray()->select('id,notice_date,header,body')
		->where(['record_status'=>'1'])->all();



		if($notice){								



			$data = ['status'=>'success', 'msg'=>$notice];



			}else{

				$data = ['status'=>'fail', 'msg'=>'List not found'];

			}

						
		return json_encode($data);

	}

	// send school features
	public function actionFeatures() { 



		$features = SchoolFeatures::find()->asArray()->select('id,icon,title,content')->where(['record_status'=>'1'])->all();



		if($features){								



			$data = ['status'=>'success', 'msg'=>$features];



			}else{

				$data = ['status'=>'fail', 'msg'=>'List not found'];

			}

						
		return json_encode($data);

	}

	// send about school
	public function actionAboutschool() { 



		$about = AboutSchool::find()->asArray()->select('id,heading,body')->where(['record_status'=>'1'])->all();



		if($about){								



			$data = ['status'=>'success', 'msg'=>$about];



			}else{

				$data = ['status'=>'fail', 'msg'=>'List not found'];

			}

						
		return json_encode($data);

	}

	// send management messages
	public function actionAdminmessage() { 



		$msg = ManagementMessages::find()->asArray()->select('id,photo,message_info')->where(['record_status'=>'1'])->all();


		if($msg){								

			$data = ['status'=>'success', 'msg'=>$msg];



			}else{

				$data = ['status'=>'fail', 'msg'=>'List not found'];

			}

						
		return json_encode($data);

	}


	// send Staff 
	public function actionSendstaff() { 



		$msg = WebsiteStaffDisplay::find()->asArray()->select('id,staff_name,staff_photo')->where(['record_status'=>'1'])->all();


		if($msg){								

			$data = ['status'=>'success', 'msg'=>$msg];



			}else{

				$data = ['status'=>'fail', 'msg'=>'List not found'];

			}

						
		return json_encode($data);

	}


	// send Achievement 
	public function actionAchievement() { 



		$msg = Achievement::find()->asArray()->select('id,photo,achievement_info')->where(['record_status'=>'1'])->all();


		if($msg){								

			$data = ['status'=>'success', 'msg'=>$msg];



			}else{

				$data = ['status'=>'fail', 'msg'=>'List not found'];

			}

						
		return json_encode($data);

	}


	public function actionDistrict() { 



		$msg = District::find()->asArray()->select('id,district_name')->where(['record_status'=>'1'])->all();


		if($msg){								

			$data = ['status'=>'success', 'msg'=>$msg];



			}else{

				$data = ['status'=>'fail', 'msg'=>'List not found'];

			}

						
		return json_encode($data);

	}


	public function actionState() { 



		$msg = State::find()->asArray()->select('id,state_name')->where(['record_status'=>'1'])->all();


		if($msg){								

			$data = ['status'=>'success', 'msg'=>$msg];



			}else{

				$data = ['status'=>'fail', 'msg'=>'List not found'];

			}

						
		return json_encode($data);

	}


	public function actionSession() { 



		$msg = AcademicSession::find()->asArray()->select('id,session_name')->where(['active_status'=>'1'])->all();


		if($msg){								

			$data = ['status'=>'success', 'msg'=>$msg];



			}else{

				$data = ['status'=>'fail', 'msg'=>'List not found'];

			}

						
		return json_encode($data);

	}

	public function actionSocialcategory() { 



		$msg = GeneralCategory::find()->asArray()->select('id,g_cat_name')->where(['record_status'=>'1'])->all();


		if($msg){								

			$data = ['status'=>'success', 'msg'=>$msg];



			}else{

				$data = ['status'=>'fail', 'msg'=>'List not found'];

			}

						
		return json_encode($data);

	}


	// insert Contact Form data to db 
	public function actionContactform() { 



				if($postdata = file_get_contents("php://input")) {

				$request = json_decode($postdata);

		
					 // echo "<pre>";print_r($index);die;

					$model = new ContactUs();

					$model->date = date('Y-m-d');
					$model->fullname = $request->fullname ;
					$model->phone = $request->phone;
					$model->email = $request->email;
					$model->message = $request->message;

					if($model->save()){

						$data = ['status'=>'success', 'msg'=>'Success'];
					}else{
						$data = ['status'=>'fail', 'msg'=> 'Fail'];
					}

					}else{

						$data = ['status'=>'fail', 'msg'=>'Invalid Body'];

					}
		return json_encode($data);

	}


	


	// insert registration info to db
	public function actionConceptregistration() { 



				if(isset($_POST['data']) && isset($_FILES['photo'])) {

					$request = $_POST['data'];
			   		$photo = $_FILES['photo'];
			   		//echo "<pre>";print_r($photo);echo "</pre>";die;
					$request = json_decode($request);

					$model = new ConceptRegistration();

					$model->application_date = date('Y-m-d');
					$model->session_id = $request->session ;
					$model->student_name = $request->student_name;
					$model->dob = $request->dob;
					$model->age = $request->age;
					$model->gender = $request->gender;
					$model->phone_no = $request->phone_no;
					$model->email = $request->email;
					$model->student_aadhaar_no = $request->aadhaar;
					$model->general_category_id = $request->social_category_id;
					$model->father_name = $request->father_name;
					$model->father_occupation = $request->father_occupation;
					$model->father_annual_income = $request->father_annual_income;
					$model->mother_name = $request->mother_name;
					$model->mother_occupation = $request->mother_occupation;
					$model->mother_annual_income = $request->mother_annual_income;
					$model->parent_phone = $request->parent_phone;
					if (isset($request->parent_alt_phone)) {

						$model->parent_alt_phone = $request->parent_alt_phone;
					}else{

						$model->parent_alt_phone = NULL;
					}
					$model->present_address = $request->present_address;
					$model->present_district_id = $request->present_district_id;
					$model->present_state_id = $request->present_state_id;
					$model->present_pincode = $request->present_pincode;

					$model->permanent_address = $request->permanent_address;
					$model->permanent_district_id = $request->permanent_district_id;
					$model->permanent_state_id = $request->permanent_state_id;
					$model->permanent_pincode = $request->permanent_pincode;

					$model->previous_school_name = $request->previous_school_name;
					$model->previous_school_board = $request->previous_school_board;

					if ($photo['type']=='image/jpeg' || $photo['type']=='image/jpg' || $photo['type']=='image/png' ) 
						{
							if ($photo['size']<='1000000') {
								
								$time = time();
								$file = $_FILES["photo"]["tmp_name"];
								$file1 = $_FILES["photo"]["name"];
								//echo "<pre>"; print_r($photo);echo "</pre>";die;
								$image=move_uploaded_file($file, '../../docs/payment/'.$time.$_FILES['photo']['name']);
								$model->payment_upload = $time.strval($file1);

								if($model->save()) {
				        			$data = ['status'=>'success', 'msg'=>'Image Successully Uploaded'];
				        		} else {
				        			$data = ['status'=>'fail', 'msg'=>$model->errors];
				        		}
		        			}else{

		        				$data = ['status'=>'fail', 'msg'=>'Image size should be less than 1MB !!'];
		        			}
		        		}else{

		        			$data = ['status'=>'fail', 'msg'=>'Either Image Format should be in JPEG/JPG/PNG'];
		        		}

					}else{

						$data = ['status'=>'fail', 'msg'=>'Invalid Body'];

					}
		return json_encode($data);

	}




	// receive franchise application data

	// public function actionFranchiseapplication() {

		



	// 		if($postdata = file_get_contents("php://input")) {

	// 			$request = json_decode($postdata);

		
	// 				 // echo "<pre>";print_r($index);die;

	// 				$model = new FranchiseContact();

	// 				$model->date_of_application = date('Y-m-d');
	// 				$model->franchise_type_id = $request->franchise_type_id;
	// 				$model->name = $request->name;
	// 				$model->phone = $request->phone;
	// 				$model->email = $request->email;
	// 				$model->interested_city = $request->interest_city;

	// 				if($model->save()){

	// 					$data = ['status'=>'success', 'msg'=>'Successfully Added'];
	// 				}else{
	// 					$data = ['status'=>'fail', 'msg'=> 'Fail to add'];
	// 				}

	// 				}else{

	// 					$data = ['status'=>'fail', 'msg'=>'Invalid Body'];

	// 				}
	// 	return json_encode($data);
	// }

	



	// public function actionLaundryorder() {
				
	// 	if($postdata = file_get_contents("php://input")) {
	// 		$request = json_decode($postdata,true);
	// 		//echo "<pre>"; print_r($request);die;

	// 					$count = count($request);
	// 					// echo "<pre>"; print_r($count);die;
	// 					for($i=0; $i<$count;$i++){

	// 							$model = new LaundryOrder();

	// 							$code = $this->randomNoGenerator(4);
	// 							 // echo "<pre>";print_r($code);die;
	// 							$model->order_code = "CL/OC/".$code;
	// 							$model->order_date = date('Y-m-d');
	// 							$model->location_id = $request[$i]["location_id"];
	// 							$model->store_info_id = $request[$i]["store_info_id"];
	// 							$model->pickup_date = $request[$i]["pickup_date"];
	// 							$model->name = $request[$i]["name"];
	// 							$model->phone = $request[$i]["phone"];
	// 							$model->address = $request[$i]["address"];
	// 							$model->description = $request[$i]["description"];
	// 							$model->status = "PROCESS-INITIATED";
	// 		                	$flag=$model->save();
	// 					}

	// 			if ($flag) {
					
	// 				$data = ['status'=>'success', 'msg'=>'Added Successfully'];
	// 			}else{
					
	// 				$data = ['status'=>'success', 'msg'=>'Fail to Add'];
	// 			}
			
	// 		}else{
	// 			$data = ['status'=>'fail', 'msg'=>'errors in sending data'];
	// 		}
								
		
	// 	return json_encode($data);
	// }
	

	public function randomNoGenerator($digits) {
        return rand(pow(10, $digits-1), pow(10, $digits)-1);
    }
	

}

