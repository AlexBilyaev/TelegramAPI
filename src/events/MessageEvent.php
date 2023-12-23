<?php

namespace api\events;

class MessageEvent {
    public $msg;

    /**
     * @param $api
     * @param $msg
     */
    public function __construct($api, $msg) {
        $this->msg = $msg;
        $this->api = $api;
    }

    /**
     * @return string
     */
    function getCommand(): string {
        $split = explode(' ', $this->msg['text']);
        $command = array_shift($split);
        return mb_strtolower($command, 'UTF-8');
    }

    /**
     * @return array
     */
    function getArgs(): array {
        $args = explode(' ', $this->msg['text']);
        $shift = array_shift($args);
        return $args;
    }

    /**
     * @return mixed
     */
    public function getChatId() {
        return $this->msg['chat']['id'];
    }

    /**
     * @return mixed
     */
    public function getUserId() {
        return $this->msg['from']['id'];
    }

    /**
     * @return mixed
     */
    public function getUsername() {
        return $this->msg['from']['username'];
    }

    /**
     * @return mixed
     */
    public function getMessageId() {
        return $this->msg['message_id'];
    }

    /**
     * @param $text
     * @return void
     */
    public function send($text) {
        $this->api->sendMessage($this->getChatId(), $this->getMessageId(), $text);
    }
}