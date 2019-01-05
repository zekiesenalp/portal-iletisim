# portal-iletisim - iletişim formu modülü

Kurulum
============
Portal iletişim formu modülünü, portal web uygulamasına eklemek için /portal dizininde bulunan composer.json dosyasına gidilerek, aşağıdaki kod parçaları repositories ve require kısımlarına eklenir. Portal dizininde composer update işlemi yapılarak modül yüklenir. 


```bash
....
"repositories": [
    {
        ....
        {
            "type": "vcs",
            "url": "https://github.com/zekiesenalp/portal-iletisim.git"
        }
],
"require": {
     
    ....   
    "kouosl/portal-iletisim": "dev-develop"
},
....
```


Modülün yüklenmesinin ardından kullanıcı ve yönetici panellerinin çalışması için gerekli olan "tablo" ve "sonuc" isimli veritabanı tabloları, modülün migrations klasörü içerisinde bulunmaktadır. Migrate işlemi için altta bulunan kod parçasının portal dizininde çalıştırılması gerekmektedir.



```bash
php yii migrate --migrationPath=@vendor/kouosl/portal-iletisim/migrations --interactive=0
```



- Admin paneli: http://portal.kouosl/admin/iletisim

![alt tag](http://zekiesenalp.com/modul/admin.jpg "Admin Paneli")


- Kullanıcı paneli: http://portal.kouosl/iletisim

![alt tag](http://zekiesenalp.com/modul/iletisim.jpg "Kullanıcı Paneli")


Önemli Notlar
============

- İlk çalıştırmada formun oluşabilmesi için önce admin panelinden form oluşturulması gerekmektedir.
- Admin paneline sadece "admin" kullanıcı adı ulaşabilir. Üyeliğin bu şekilde açılması gerekmektedir.

![alt tag](http://zekiesenalp.com/modul/admin1.jpg "Kullanıcı Paneli")

- Kullanıcının doldurduğu formun bir kopyası, verilen e-mail adresine gönderilmektedir. E-mail işlemleri için SMTP kullanılmıştır.
- SMTP servisi, Kocaeli Üniversitesi ağında engelli olduğu için çalışmamaktadır. Modülün, başka bir ağda denenmesi gerekmektedir.
- Form ekranındaki captcha sorgulaması, portal-theme içerisindeki frontend-main'de javascript ile yazılmıştır.

```bash

$("input[name=guvenlik_kodu]").on("change paste keyup", function() {

    var girilen = $("input[name=guvenlik_kodu]").val();
   
   if(sayi == girilen){
  
        $("button[name=contact-button]").removeAttr("disabled");
   }

```

- Dosya yükleme özelliği istendiği takdirde kutucuk içine istenen uzantılar virgülle yazılarak form oluşturulur. (Örnek: zip,jpg)
- Kullanıcı tarafından yüklenen dosyalar /portal/vendor/yiisoft/yii2/web/uploads/ dizininde depolanmaktadır.

![alt tag](http://zekiesenalp.com/modul/upload.jpg "Upload Dizini")

- Doldurulan formların içeriği veritabanına kaydedilmektedir.
- Admin tarafından oluşturulan ve kullanıcı tarafından doldurulan son 5 formun içeriği admin panelinde gösterilmektedir.
- Modül içi dil dönüşümleri için Module.php ve index.php dosyaları ayarlanmıştır. Modülün içine bir örnek konmuştur. Contact form başlığı, Türkçe karşılığıyla basılmaktadır.

```bash
\Yii::$app->language = 'tr-TR';
echo Module::t('iletisim','Contact Form');
```



Yapım Aşamaları
============

- 22.12.18:
    - modülün frontend kısmı hazırlandı, formlar yerleştirildi.
    - e-mail ayarları yapıldı. formu dolduran kullanıcıya e-mail gönderildi.

- 23.12.18:
    - modülün admin kısmı hazırlandı, form oluşturma seçenekleri eklendi.

- 29.12.18:
    - admin paneli ve layout düzenlemesi yapıldı. 
 
- 02.01.19:
    - kullanıcı paneline captcha eklendi.
    - layout düzenlemesi yapıldı. 
    - 2 tablonun migration'ı eklendi.


