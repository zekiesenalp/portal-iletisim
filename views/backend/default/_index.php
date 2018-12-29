<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Admin Paneli';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
   

    <div class="row">

        <div class="col-lg-4">
            <h1>Son Eklenen Tablolar</h1>
            <table class="table table-striped table-dark table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Email</th>
                        <th>Konu</th>
                        <th>Mesaj</th>
                        <th>File</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                   <?php 
                  foreach ($sonuc2 as $key => $value) {
                      echo "  <tr>";
                      echo "<th>".$value["id"]."</th>";
                      echo"<th>✔</th><th>✔</th><th>✔</th><th>✔</th><th>✔</th>";
                      if($value["phone_number"] == "1"){
                        echo "<th>✔</th>";
                      }else{
                        echo "<th>✖</th>";
                      }
                      if(!empty($value["file_upload"])){
                        echo "<th>✔</th>";
                      }else{
                        echo "<th>✖</th>";
                      }
                      echo "</tr>";
                  }
                  ?>
                </tbody>
            </table>
        </div>

        <div class="col-lg-4">
             <h1><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'ad')->textInput(['disabled' => 'disabled','value'=>'Zorunlu alan.']) ?>
                <?= $form->field($model, 'soyad')->textInput(['disabled' => 'disabled','value'=>'Zorunlu alan.']) ?>

                <?= $form->field($model, 'email')->textInput(['disabled' => 'disabled','value'=>'Zorunlu alan.']) ?>

                <?= $form->field($model, 'konu')->textInput(['disabled' => 'disabled','value'=>'Zorunlu alan.']) ?>

                <?= $form->field($model, 'mesaj')->textarea(['rows' => 6,'disabled'=>'disabled']) ?>
                <?php 
               
					echo "Opsiyonel Girişler: <br />Telefon numarası girişi isteniyorsa YES seçilir.<br /> Dosya yüklemesi isteniyorsa istenen uzantılar virgülle yazılır."
                 ?>
                <?= $form->field($sonuc, 'phone_number')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']); ?>
                
                <?= $form->field($sonuc, 'file_upload')->textInput(['maxlength'=>15, 'placeholder' => 'İstenilen uzantıları girin Örn: zip,jpg']) ?>
		          <div class="form-group">
                    <?= Html::submitButton('Kaydet', ['class' => 'btn btn-warning', 'name' => 'contact-button']) ?>
              	  </div>

            <?php ActiveForm::end(); ?>
        </div>
               <div class="col-lg-4">
                <h1>Gönderilen Son 5 Kayıt</h1>
            <table class="table table-striped table-dark table-bordered">
                <thead>
                    <tr>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Email</th>
                        <th>Konu</th>
                        <th>Mesaj</th>
                        <th>Phone</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                  foreach ($tablo2 as $key => $value) {
                      echo "<tr><th>".$value["ad"]."</th><th>".$value["soyad"]."</th><th>".$value["email"]."</th><th>".$value["konu"]."</th>
                      <th>".substr($value["mesaj"], 0,50)."</th><th>".$value["phone_number"]."</th></tr>";
                  }
                  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
