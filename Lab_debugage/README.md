# Lab debug
## Travail à faire 
- Comment déboguer PHP

## Solution
1. Obtenir des informations sur la version de PHP sur votre appareil

```php
<?php
phpinfo();
```
2. Copiez toutes les informations
3. ouvre ce site
[xdebug.org](https://xdebug.org/wizard)

4. Download php_xdebug-3.3.0-8.2-vs16-x86_64.dll
5. Déplacez le fichier téléchargé en texte et renommez-le en php_xdebug.dll
6. Mettez à jour C:\Program Files (x86)\php-8.2.11\php.ini et ajoutez les lignes suivantes :

```
zend_extension = xdebug

[XDebug]
xdebug.mode = debug
xdebug.start_with_request = yes
```
7. ajoutez cette extension dans vscode :
> php debug

## référence

[coderJeet](https://youtu.be/8ka_Efpl21Y?si=w3Kj_80FDRczymHt)

