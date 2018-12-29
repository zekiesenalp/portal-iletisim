<?php
namespace kouosl\iletisim\controllers\frontend;

use yii\helpers\ArrayHelper;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use kouosl\iletisim\models\ContactForm;
use kouosl\iletisim\models\Tablo;
use kouosl\iletisim\models\UploadForm;
use yii\web\UploadedFile;
use yii\filters\Cors;

/**
 * Default controller for the `iletisim` module
 */
class DefaultController extends \kouosl\base\controllers\frontend\BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
    	 //if(Setting::findOne(['setting_key' => 'contact'])->value === 'true'){
        $phone = Yii::$app->db->createCommand('SELECT phone_number FROM sonuc ORDER BY id DESC LIMIT 0,1')->queryColumn();
        $file = Yii::$app->db->createCommand('SELECT file_upload FROM sonuc ORDER BY id DESC LIMIT 0,1')->queryColumn();
       
        $file2 = new UploadForm();
        $model = new Tablo();
         if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {

                   $file2->file = UploadedFile::getInstance($file2, 'file');
                       $file2->file->saveAs('/var/www/portal/vendor/yiisoft/yii2/web/uploads/' . $file2->file->baseName . '.' . $file2->file->extension);
                     if ($model->sendEmail()) {
                        Yii::$app->session->setFlash('success', 'Başarılı. Formun bir kopyası mail adresinize gönderilecektir.');
                        } else {
                            Yii::$app->session->setFlash('error', 'Hata. Bir sorun meydana geldi.');
                        }      
                

            return $this->refresh();
        } else {
            return $this->render('_index', [
                'model' => $model,
                'phone' => $phone,
                'file' => $file,
                'file2' => $file2,
            ]);
        }
    }

}
