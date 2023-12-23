<?php
namespace api\utils;
use api\utils\Terminal;

class Logger {
    public function __construct() {
        Terminal::init();
    }

    /**
     * @param $message
     * @return void
     */
    public function info($message) {
        echo Terminal::$COLOR_DARK_AQUA.'('.Terminal::$COLOR_BLUE.'BOT'.Terminal::$COLOR_DARK_AQUA.') '.Terminal::$COLOR_DARK_AQUA.'['.Terminal::$COLOR_AQUA.'INFO'.Terminal::$COLOR_DARK_AQUA.']'.Terminal::$COLOR_YELLOW.': '.$message.Terminal::$FORMAT_RESET."\n";
    }

    /**
     * @param $message
     * @return void
     */
    public function warning($message) {
        echo Terminal::$COLOR_DARK_AQUA.'('.Terminal::$COLOR_BLUE.'BOT'.Terminal::$COLOR_DARK_AQUA.') '.Terminal::$COLOR_DARK_AQUA.'['.Terminal::$COLOR_GOLD.'WARNING'.Terminal::$COLOR_DARK_AQUA.']'.Terminal::$COLOR_WHITE.': '.$message.Terminal::$FORMAT_RESET."\n";
    }

    /**
     * @param $message
     * @return void
     */
    public function error($message) {
        echo Terminal::$COLOR_DARK_AQUA.'('.Terminal::$COLOR_BLUE.'BOT'.Terminal::$COLOR_DARK_AQUA.') '.Terminal::$COLOR_DARK_AQUA.'['.Terminal::$COLOR_RED.'ERROR'.Terminal::$COLOR_DARK_AQUA.']'.Terminal::$COLOR_DARK_RED.': '.$message.Terminal::$FORMAT_RESET."\n";
    }
}