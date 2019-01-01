# portal-iletisim - iletişim formu modülü

Kurulum
============
Portal iletişim formu modülünü, portal web uygulamasına eklemek için /portal dizininde bulunan composer.json dosyasına gidilerek, aşağıdaki kod parçaları repositories ve require kısımlarına eklenir. Composer update'in ardından modül çalışır hale gelecektir.

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

- Admin paneli: http://portal.kouosl/admin/iletisim
- Kullancı paneli: http://portal.kouosl/iletisim


Önemli Notlar
============
- Admin panelinde bulunan Ad, Soyad, E-mail, Konu, Mesaj form kutucukları zorunlu olarak ayarlanmış olup, formdan çıkarılamaz.
- Telefon numarası ve dosya yükleme seçenekleri opsiyonel olarak seçilebilmektedir.
- Dosya yükleme özelliği istendiği takdirde kutucuk içine istenen uzantılar virgülle yazılarak form oluşturulur. (Örnek: zip,jpg)
- Doldurulan formların içeriği veritabanına kaydedilmektedir.
- Admin tarafından oluşturulan ve kullanıcı tarafından doldurulan son 5 formun içeriği admin panelinde gösterilmektedir.
- Kullanıcı tarafından yüklenen dosyalar /portal/vendor/yiisoft/yii2/web/uploads/ dizininde depolanmaktadır.
- Kullanıcının doldurduğu formun bir kopyası, verilen e-mail adresine gönderilmektedir. E-mail işlemleri için SMTP kullanılmıştır.


# 22.12.18
 - modülün frontend kısmı hazırlandı, formlar yerleştirildi.
 - e-mail ayarları yapıldı. formu dolduran kullanıcıya e-mail gönderildi.

# 23.12.18
 - modülün admin kısmı hazırlandı, form oluşturma seçenekleri eklendi.

# 29.12.18
 - admin paneli ve layout düzenlemesi yapıldı. 
 
 
 


