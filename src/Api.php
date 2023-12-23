<?php

namespace api;
use api\utils\Logger;
class Api {
    /**
     * @param $token
     * @param $bot
     */
    public function __construct($token, $bot)
    {
        $l = new Logger();
        $l->info('Бот успешно запущен!');
        set_time_limit(0);
        ignore_user_abort(0);
        ini_set('max_execution_time', 0); //exec time
        ini_set('memory_limit', '999999999M'); //memmory limit
        date_default_timezone_set('Asia/Jakarta'); // timezone
        if (!empty($_SERVER['HTTP_USER_AGENT'])) {
            $userAgents = array(
                'Googlebot',
                'DuckDuckBot',
                'Baiduspider',
                'Exabot',
                'SimplePie',
                'Curl',
                'OkHttp',
                'SiteLockSpider',
                'BLEXBot',
                'ScoutJet',
                'AdsBot Google Mobile',
                'Googlebot Mobile',
                'MJ12bot',
                'Slurp',
                'MSNBot',
                'PycURL',
                'facebookexternalhit',
                'facebot',
                'ia_archiver',
                'crawler',
                'YandexBot',
                'Rambler',
                'Yahoo! Slurp',
                'YahooSeeker',
                'bingbot'
            );
            if (preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
                header('HTTP/1.0 404 Not Found');
                exit();
            }
            unset($userAgents);
        }
        define('BOT_TOKEN', $token); // Token
        define('USERNAME', 'bilyaev_a_d'); // author Username
        define('BOTNAME',$bot); // alias bot Name
    }

    /**
     * @param $cid
     * @param $mid
     * @param $msg
     * @return void
     */
    public function sendMessage($cid, $mid, $msg){
        $this->bot('SendMessage',
            ['chat_id' => $cid,
                'reply_to_message_id' => $mid,
                'text' => $msg
            ]);
    }

    /**
     * @param $cid
     * @param $mid
     * @return void
     */
    public function deleteMessage($cid, $mid) {
        $this->bot('deleteMessage',
            ['chat_id' => $cid,
                'message_id' => $mid
            ]);
    }

    /**
     * @param $url
     * @param $data
     * @return bool|string
     */
    private function post_data($url, $data){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        return curl_exec($ch);
        curl_close($ch);
        unset($url,$data,$ch);
    }

    /**
     * @param $str
     * @return string
     */
    private function hex($str) {
        $ec = bin2hex($str);
        $ec = chunk_split($ec, 2, '\x');
        $ec = '\x' . substr($ec, 0, strlen($ec) - 2);
        return $ec;
        unset($str,$ec);
    }

    /**
     * @param $method
     * @param $datas
     * @return mixed
     */
    private function bot($method, $datas = []) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot'.BOT_TOKEN.'/'.$method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $res = curl_exec($ch);
        curl_close($ch);
        return json_decode($res, 1);
        unset($ch,$method,$datas,$res);
    }

    /**
     * @param $up_id
     * @return false|mixed
     */
    public function getupdates($up_id) {
        $get=$this->bot('getupdates', ['offset' => $up_id]);
        return end($get['result']);
        unset($get,$up_id);
    }
}