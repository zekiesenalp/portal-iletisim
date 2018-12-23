<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'İletişim Formu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form','options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'ad')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'soyad') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'konu') ?>
                <?php

                if($phone[0] == 1){  echo $form->field($model, 'phone_number'); }
                if(trim($file[0]) != ""){ echo $form->field($file2, 'file')->fileInput(); } 
                ?>
                <?= $form->field($model, 'mesaj')->textarea(['rows' => 6]) ?>

               

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-warning', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
