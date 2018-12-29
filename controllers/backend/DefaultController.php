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
         $sonuc2 = Yii::$app->db->createCommand('SELECT * FROM sonuc order by id desc limit 0,5')->queryAll();
         $tablo2 = Yii::$app->db->createCommand("SELECT * FROM tablo order by 'date' desc limit 0,5")->queryAll();
         if ($sonuc->load(Yii::$app->request->post()) && $sonuc->validate() && $sonuc->save()) {
           
                
                Yii::$app->session->setFlash('success', 'Form başarıyla oluşturuldu.');
          
            

            return $this->refresh();
        } else {
            return $this->render('_index', [
                'model' => $model,
                'sonuc' => $sonuc,
                'sonuc2' => $sonuc2,
                'tablo2' => $tablo2,
            ]);
        }
    }
}
