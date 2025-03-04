<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\ClassInfo;
use app\models\AcademicSession;
use app\models\SchoolDetail;

$school = SchoolDetail::find()->one();
$session = AcademicSession::find()->where(['active_status' => '1'])->one();
$class = ArrayHelper::map(ClassInfo::find()->all(), 'id', 'class_name');

$this->registerCssFile("https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css", [
    'depends' => [\yii\web\YiiAsset::class],
]);

$user = yii::$app->user->id;
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" media="all">

<style>
/* Fullscreen Green Background */
.school-print {
    /*height: 100vh;*/
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: #3ea85b;
    padding: 20px;
}

/* A4 Page Styling */
#report {
    width: 210mm;
    height: 297mm;
    background: white;
    padding: 25px;
    border-radius: 7px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
}

/* Print Styles */
@media print {
    body {
        background: none;
    }

    .school-print {
        background: none;
        height: auto;
        padding: 0;
    }

    #report {
        width: 100%;
        height: auto;
        box-shadow: none;
        border-radius: 0;
        padding: 10mm;
    }

    /* Hide Buttons on Print */
    .no-print {
        display: none !important;
    }
}
</style>

<div class="school-print">
    <!-- Top Buttons -->
    <div class="no-print d-flex justify-content-between w-100">
        <span><?= Html::a('<span class="fa fa-backward"></span> Back', ['student-info/check'], ['class' => 'btn btn-danger']) ?></span>
        <span><button type="button" class="btn btn-warning" id="print-report"><i class="fa fa-print"></i> Print</button></span>
    </div>

    <br>

    <!-- A4 Page Content -->
    <div id="report">


        <div class="w-100 text-center">
            <tr>
                
                <td class="text-center">
                    
                    <h4><b style="color: #1e3d75"><?= strtoupper($school->school_name) ?></b></h4>
                    <p class="font-weight-bold" style="font-size: 13px"><?= $school->school_address ?></p>
                </td>
                
            </tr>
        </div>
        <table class="w-100">
            <tr>
                <td>
                    <img src="<?= 'docs/logo/' . $school->school_photo ?>" alt="School Logo" style="width: 40%; object-fit: contain">
                </td>
                <td class="text-center">
                    <p style="font-weight: bold;font-size:17px">ADMISSION RECEIPT</p>
                    <p class="font-weight-bold" style="font-size: 16px"><?= $session->session_name ?></p>   
                </td>
                <td class="text-right">
                    <img src="<?= 'docs/logo/' . $school->school_photo ?>" alt="School Logo" style="width: 40%; object-fit: contain">
                </td>
            </tr>
        </table>

        <br>

        <!-- Bill Details -->
        <table class="w-100">
            <tr>
                <td><h6>Bill No: <?= $fee->invoice ?></h6></td>
                <td class="text-right"><h6>Date: <?= date('d-m-Y', strtotime($fee->payment_date)) ?></h6></td>
            </tr>
        </table>

        <hr style="border: solid 1px gray">
        <br>

        <!-- Student Details -->
        <table class="w-100 font-weight-bold">
            <tr>
                <td>Name: <?= $details->stud_name ?></td>
                <td>Class: <?= $class[$details->course_id] ?></td>
                <td>Gender: <?= $details->gender ?></td>
            </tr>
            <tr>
                <td style="padding-top: 30px">Address: <?= $details->permanent_address ?></td>
            </tr>
        </table>

        <br>
        <hr style="border: solid 1px gray">
        <br>

        <!-- Payment Details -->
        <?php if (!empty($fee)) { ?>
        <div class="table-responsive">
            <h5>Admission Fee Payment Details:</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Purpose</th>
                    <th>Admission Fee</th>
                    <th>Fine (if any)</th>
                    <th>Discount (if any)</th>
                    <th>Payable Fee</th>
                    <th>Amount Paid</th>
                    <th>Due Amount (if any)</th>
                </tr>
                <tr>
                    <td>Admission Fee</td>
                    <td><?= "Rs " . $fee->total_fee ?></td>
                    <td><?= "Rs " . $fee->fine ?></td>
                    <td><?= "Rs " . $fee->discount ?></td>
                    <td><?= "Rs " . $fee->payable_amount ?></td>
                    <td><?= "Rs " . $fee->amount_received ?></td>
                    <td><?= "Rs " . $fee->due_amount ?></td>
                </tr>
            </table>
        </div>
        <?php } ?>

        <br>

        <!-- Student Particulars -->
        <?php if (!empty($particular)) { ?>
        <div class="table-responsive">
            <h5>Student Particulars Payment Details:</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Sl No</th>
                    <th>Particular Name</th>
                    <th>Amount</th>
                </tr>
                <?php 
                $tot = 0;
                foreach ($particular as $key => $value) { ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value['particular_name'] ?></td>
                    <td><?= "Rs " . $value['price'] ?></td>
                </tr>
                <?php $tot += $value['price']; } ?>
                <tr>
                    <td colspan="2" class="text-center"><b>Particulars Total Amount</b></td>
                    <td><b><?= "Rs " . $tot ?></b></td>
                </tr>
            </table>
        </div>
        <?php } ?>

        <br>

        <div class="text-right font-weight-bold" style="font-size: 18px">
            <div>Total Amount: Rs <?= $tot + $fee->amount_received ?></div>
            <div>Total Due (if any): Rs <?= $fee->due_amount ?></div>
        </div>

        <br><br>

        <div class="text-right" style="font-size: 17px">
            <div>Received By: <?= $user ?></div>
        </div>
    </div>
</div>

<script>
document.getElementById('print-report').addEventListener('click', function() {
    window.print();
});
</script>
