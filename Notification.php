<?php
namespace preneesh\FirebaseNotifications;


use Yii;
use yii\base\Component;
use yii\httpclient\Client;

/**
 * @author Preneesh AV
 **/

class Notification extends Component
{
    /**
     * @var string the auth_key Firebase cloud messageing Server key
     * which can be obtained from Firebase console -> Project Overview -> Settings -> Cloud Messaging
    * */
    public $authKey;

    /**
     * @var string the api_url for Firebase cloude messageing.
    **/

    public $apiUrl = 'https://fcm.googleapis.com/fcm/send';

    public function __construct($key)
    {
        $this->authKey = $key;
        if (!$this->authKey) throw new \Exception("Empty authKey");
    }

    /**
     * send raw body to FCM
     * @param array $token ,$message
     * @return mixed
     */
    public function send($tokens,$message)
    {
      $notification = [
                    "title"             => $message['title'],
                    "body"              => $message['body'],
                    'sound'             => 'default',
                  ];

      $fields = array(
                    'to' => $tokens,
                    'notification'         => $notification,
                    'android'         => [
                        "notification"      => $notification,
                    ],
                    'apns'         => [
                        "payload"      => [
                            "sound"      => 'default',
                        ],
                    ],
                );

        $client = new Client();
        $response = $client->createRequest()
                ->setMethod('POST')
                ->setUrl($this->apiUrl)
                ->setData( $fields)
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders(['content-type' => 'application/json'])
                ->addHeaders(['Authorization' => 'key=' . $this->authKey])
                ->send();


        if ($response->isOk) {
            $fcm_response = $response->getData();
            return $fcm_response;
        }
    }
}
