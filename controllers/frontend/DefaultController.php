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
use kouosl\iletisim\models\Setting;
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

        $model = new Tablo();
         if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {
           
                if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
            

            return $this->refresh();
        } else {
            return $this->render('_index', [
                'model' => $model,
            ]);
        }
    }

}
