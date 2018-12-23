<?php

namespace kouosl\iletisim\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
/**
 * @var UploadedFile|Null file attribute
 */
public $file;

/**
 * @return array the validation rules.
 */
public function rules()
{
     $ext = Yii::$app->db->createCommand('SELECT file_upload FROM sonuc ORDER BY id DESC LIMIT 0,1')->queryColumn();
       
    return [
        [['file'], 'file', 'extensions' => $ext[0]],
    ];
}
}