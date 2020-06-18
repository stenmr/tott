# TLÜ OTT

Tegemist on Tallinna Ülikool Informaatika õppekava raames valminud projektiga. Leht sai loodud Tarkvaraarenduse projekti aine raames. Projekti tegid Sten Raudmets, Brita Liivamaa ja Elina Sirk.

Lõime lehe TLÜ ELU projektile TLÜ OTT. TLÜ OTT projekti põhieesmärgiks oli välja töötada süsteem, mis võimaldab väiketootjate ja talunike kaupa pakkuda mugavalt Tallinna Ülikooli tudengitele ja töötajatele. Meie ülesanne oli luua veebileht, mis seda võimaldaks. Täpsemalt oli meie eesmärgiks luua leht, mis võimaldaks tellida tooteid otse taludelt Tallinna Ülikoolis asuvatesse kapidesse. Samuti oli oluline, et talunikud saaksid oma tooteid ja tellimusi mugavalt hallata.

![Avaleht]("avaleht.png?raw=true")

## Kasutatud tehnoloogiad

* Ubuntu 18.04
* PHP 7.2
* MySQL 8.0
* mikecao/flight 1.3
* google/apiclient 2.5
* pixelrobin/php-feather 1.0
* intervention/image 2.5

## Installatsioon

1. Kloonida repo
2. Jooksutada kaustas `composer install`
3. Loo andmebaas vastavalt failile Tott-2_create.sql failile kaustas
4. Kaustast üks kaust kõrgemal peaks olema db.ini, admins.ini ja oauth-credentials.json
5. Jooksuta PHP server

### db.ini

Asenda `?` sinu andmebaasi infoga.

```
[database]
driver = mysql
host = ?
port = ?
name = ?
username = ?
password = ?
```

### admins.ini

Lisa faili nii palju emaile kui soovid.

```
[Admins]
admins[] = "?@gmail.com"
admins[] = "?@gmail.com"
admins[] = "?@gmail.com"
```

### oauth-credentials.json

1. Mine lehele https://console.developers.google.com/apis/credentials?authuser=1
2. Vajuta Create credentials > OAuth client ID.
3. Application type peab olema Web application.
4. Loo application.
5. Nüüd saad Credentials menüüst alla laadida API võtmed .json kujul, nimeta allalaetud fail ümber oauth-credentials.json ja aseta kausta.