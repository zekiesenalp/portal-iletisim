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
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'ad')->textInput(['disabled' => 'disabled','value'=>'Zorunlu alan.']) ?>
                <?= $form->field($model, 'soyad')->textInput(['disabled' => 'disabled','value'=>'Zorunlu alan.']) ?>

                <?= $form->field($model, 'email')->textInput(['disabled' => 'disabled','value'=>'Zorunlu alan.']) ?>

                <?= $form->field($model, 'konu')->textInput(['disabled' => 'disabled','value'=>'Zorunlu alan.']) ?>

                <?= $form->field($model, 'mesaj')->textarea(['rows' => 6,'disabled'=>'disabled']) ?>
                <?= $form->field($sonuc, 'phone_number')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']); ?>
                <?= $form->field($sonuc, 'file_upload')->textInput(['maxlength'=>15]) ?>
		          <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-warning', 'name' => 'contact-button']) ?>
              	  </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
