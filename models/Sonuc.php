<?php

namespace kouosl\iletisim\models;

use Yii;

/**
 * This is the model class for table "sonuc".
 *
 * @property int $phone_number
 * @property string $file_upload
 */
class Sonuc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sonuc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
          	[['phone_number'], 'required'],
            [['phone_number'], 'integer'],
            [['file_upload'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'phone_number' => 'Phone Number',
            'file_upload' => 'File Upload',
        ];
    }
}
