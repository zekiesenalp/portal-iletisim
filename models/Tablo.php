<?php

namespace kouosl\iletisim\models;

use Yii;

/**
 * This is the model class for table "tablo".
 *
 * @property string $ad
 * @property string $soyad
 * @property string $date
 * @property string $email
 * @property string $konu
 * @property string $mesaj
 * @property int $phone_number
 * @property string $file_upload
 */
class Tablo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tablo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ad', 'soyad', 'email', 'konu', 'mesaj'], 'required'],
            [['date'], 'safe'],
            [['mesaj'], 'string'],
            [['phone_number'], 'integer'],
            [['ad', 'soyad'], 'string', 'max' => 50],
            [['email', 'konu'], 'string', 'max' => 100],
            [['file_upload'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
     public function sendEmail()
    {
        include 'PHPMailer.php';
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->IsHTML(true);
        //$mail->SetLanguage("tr", "phpmailer/language");
        $mail->CharSet  ="utf-8";
        $mail->Username = "zekiesenalpadm@gmail.com"; // Mail adresimizin kullanicı adi
        $mail->Password = "zekiesenalp123"; // Mail adresimizin sifresi
        $mail->SetFrom($this->email, $this->ad." ".$this->soyad); // Mail attigimizda gorulecek ismimiz
        $mail->AddAddress($this->email); // Maili gonderecegimiz kisi yani alici
        $mail->Subject = $this->konu; // Konu basligi
        $mail->Body = $this->mesaj."<br />".$this->phone_number."<br />".$this->file_upload; // Mailin icerigi
        if(!$mail->Send()){
           return false;
        } else {
            return true;
        }
      
    }
}
