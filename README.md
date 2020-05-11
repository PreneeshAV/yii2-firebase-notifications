# yii2-firebase-notifications
Send firebase notification from Yii2 application (Beta version)

==

Send firebase notification from Yii2 application

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist preneesh/yii2-firebase-notifications "dev-master"
```

or add

```
"preneesh/yii2-firebase-notifications": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php


$service = new FirebaseNotifications('YOUR_KEY');

$service->send($tokens,$message);
