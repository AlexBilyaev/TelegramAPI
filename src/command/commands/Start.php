<?php

namespace api\command\commands;

class Start {
    /**
     * @param $event
     * $event->getUserId() - получить айди пользователя отправившего сообщение
     * $event->getUsername() - получить имя пользователя (пример bilyaev_a_d)
     * $event->getCommand() - олучить команду которую отправил пользователь
     * $event->getArgs() - получить аргументы к команде (пример: пользователь вводит /start 1 то $event->getArgs()[0] будет 1
     * $event->send() - отправить сообщение пользователю
     */
    public function __construct($event) {
            if ($event->getCommand() == '/start') {
                $event->send("Бот успешно работает!!!");
            }
    }
}