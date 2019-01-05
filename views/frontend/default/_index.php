<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use kouosl\iletisim\Module;
use \kouosl\site\models\Setting;




$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-iletisim">
    <h1><?= Html::encode($this->title) ?></h1>

    

    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-5">
              <img src="http://ridvankaplan.com/wp-content/themes/graphene/images/headers/nebula.jpg">
            <h1> <?php 
            $lang = yii::$app->session->get('lang');
			\Yii::$app->language = $lang;
			yii::$app->session->set('lang',$lang);

			\Yii::$app->language = 'tr-TR'; // /iletisim sayfası default olarak kendini en-US ayarladığı için tr'yi belirtmek zorunda kaldım. Çeviri özelliği çalışıyor. Module.php ayarları yapıldı.

            echo Module::t('iletisim','Contact Form');
            ?> </h1>
            <?php 


            $form = ActiveForm::begin(['id' => 'contact-form','options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'ad')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'soyad') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'konu') ?>
                <?php

                if($phone[0] == 1){  echo $form->field($model, 'phone_number'); }
                if(trim($file[0]) != ""){ echo $form->field($file2, 'file')->fileInput(); } 
                ?>
                <?= $form->field($model, 'mesaj')->textarea(['rows' => 6]) ?>

                <?php $sayi = substr(rand(), 0,6); ?>
                <img src="http://ahmetmanga.net/dosyalar/guvenlik_kodu.php?q=<?php echo $sayi; ?>">
                <div class="row"> 
                <div class="col-md-12 col-lg-12">
                <hr style="min-width:85%; background-color:#a1a1a1 !important; height:1px;"/>
                </div>
                 </div>
                <input type="text" class="form-control" placeholder="Güvenlik Kodunu Girin" name="guvenlik_kodu" deger="<?php echo $sayi; ?>">
                <div class="row"> 
                <div class="col-md-12 col-lg-12">
                <hr style="min-width:85%; background-color:#a1a1a1 !important; height:1px;"/>
                </div>
                 </div>
                
                <div class="form-group">
                    <?= Html::submitButton('Gönder', ['class' => 'btn btn-success', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
