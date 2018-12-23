<?php
namespace kouosl\iletisim\controllers\backend;
use yii\helpers\ArrayHelper;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use kouosl\iletisim\models\ContactForm;
use kouosl\iletisim\models\Tablo;
use kouosl\iletisim\models\Sonuc;
use kouosl\iletisim\models\Setting;
use yii\filters\Cors;


/**
 * Default controller for the `iletisim` module
 */
class DefaultController extends \kouosl\base\controllers\backend\BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
         $sonuc = new Sonuc();
         $model = new Tablo();
         if ($sonuc->load(Yii::$app->request->post()) && $sonuc->validate() && $sonuc->save()) {
           
                
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
          
            

            return $this->refresh();
        } else {
            return $this->render('_index', [
                'model' => $model,
                'sonuc' => $sonuc,
            ]);
        }
    }
}
