# yii2-firebase-notifications
Send firebase notification from Yii2 application 

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
Firebase cloud messageing Server key is required to use the extension,
which can be obtained from Firebase console -> Project Overview -> Settings -> Cloud Messaging
```php

use preneesh\FirebaseNotifications\Notification;

$service = new Notification('YOUR_KEY');

$message = array();
$message['title']= "New Offer";
$message['body']= "New Year offer for the all products";

#unique token to be captured from android app and stored against user for sending notification to specific user
$tokens = "d-Uh6MC1eTk:APA91bHjvSR3BDjfBqt4-ZkPbu69aije4HCzcKqvIpcBJof8Zc7z8jVeVb1WLGEjfgd6POBfW-qGUcSsESiOAOKbFnOHt_m1rk-deElMgIsojS7gpF7trgYmsLjrxICsZg7LRgPXyn6b-eqCk9nE";

$service->send($tokens,$message);
