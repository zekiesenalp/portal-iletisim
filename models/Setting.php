<?php

namespace kouosl\iletisim\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string $setting_key
 * @property string $value
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['setting_key', 'value'], 'required'],
            [['setting_key', 'value'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'setting_key' => 'Setting Key',
            'value' => 'Value',
        ];
    }
}
