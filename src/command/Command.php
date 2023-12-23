<?php

namespace api\command;
use api\utils\Logger;
class Command {
    private array $commands;
    private $event;

    /**
     * @param $event
     */
    public function __construct($event) {
        $this->commands = ['Start']; //Указывать класс, который расположен в папке src/command/commands
        $this->event = $event;

    }

    /**
     * @return void
     */
    public function run() {
        foreach ($this->commands as $command) {
            $this->registerCommand($command, $this->event);
        }
    }

    /**
     * @param $class
     * @param $event
     * @return void
     */
    private function registerCommand($class, $event) {
        $cl = "api\\command\\commands\\".$class;
        $cl = new $cl($event);
    }
}
