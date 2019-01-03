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
- Kullanıcı paneli: http://portal.kouosl/iletisim



Önemli Notlar
============

- Admin panelinde bulunan Ad, Soyad, E-mail, Konu, Mesaj form kutucukları zorunlu olarak ayarlanmış olup, formdan çıkarılamaz.
- Telefon numarası ve dosya yükleme seçenekleri opsiyonel olarak seçilebilmektedir.
- Dosya yükleme özelliği istendiği takdirde kutucuk içine istenen uzantılar virgülle yazılarak form oluşturulur. (Örnek: zip,jpg)
- Doldurulan formların içeriği veritabanına kaydedilmektedir.
- Admin tarafından oluşturulan ve kullanıcı tarafından doldurulan son 5 formun içeriği admin panelinde gösterilmektedir.
- Kullanıcı tarafından yüklenen dosyalar /portal/vendor/yiisoft/yii2/web/uploads/ dizininde depolanmaktadır.
- Kullanıcının doldurduğu formun bir kopyası, verilen e-mail adresine gönderilmektedir. E-mail işlemleri için SMTP kullanılmıştır.
- Form ekranındaki captcha sorgulaması javascript ile sağlanmaktadır.



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


