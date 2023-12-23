<?php
/*
 * Developer: AlexBilyaev
 */
require "./vendor/autoload.php";
use api\Api;
use api\events\MessageEvent;
use api\command\Command;
use api\utils\Logger;

error_reporting(E_ERROR);
$api = new Api('токен', 'Ссылка на бота');
$l = new Logger();
while(true) {
    $last_up = $api->getupdates(@$last_up['update_id'] + 1);
    //$last_up = $get_up['update_id'];
    $msg = $last_up['message'];
    $event = new MessageEvent($api, $msg);
    $cmd = new Command($event);
    $cmd->run();
}
