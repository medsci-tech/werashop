<?php


namespace App\Werashop\Message;


/**
 * Class LuosimaoMessageSender
 * @package App\Werashop\Message
 */
class LuosimaoMessageSender implements MessageSenderInterface
{
    /**
     * @param int $start
     * @param int $end
     * @return int
     */
    public function generateMessageVerify($start = 000000, $end = 999999)
    {
        return random_int($start, $end);
    }

    /**
     * @param $phone
     * @param $verify
     * @return int
     */
    public function sendMessageVerify($phone, $verify)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://sms-api.luosimao.com/v1/send.json");

        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, 'api:key-' . env('SMS_KEY'));
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            array('mobile' => $phone, 'message' => '验证码：' . $verify . '【易康商城】'));

        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }
}