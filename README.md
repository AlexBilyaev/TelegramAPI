<h1>Описание</h1>
<h3>Данная библиотека, позволяет создавать бота в мессенджере Telegram используя Longpoll.</h3>
<h4>Работает на php 7.2+ проверялось так же на php 8.3</h4>
<br>
<h1>Инструкция</h1>
<br>
<h3>В корневой папке проекта в файле main.php нужно ввести токен и ссылка на бота без @.</h3>

```php
$api = new Api('токен', 'Ссылка на бота'); 
```

<h3>Пример:</h3>

```php
$api = new Api('fi789rf80g348v8giv-GHJyugydgfygw78uy478gvsug48', 'tkgthis_bot'); 
```
<br>
<h3>Как добавили токен и ссылку на бота нужно обновить composer:</h3>

```
composer update
```
<h3>Запуск бота:</h3>

```
php .\main.php
```

<br>
<h1>Создание комманд</h1>
<h3>Комманды создаються в папке /src/command/commands/Command.php</h3>

<h3>Для того что бы создать новую команду нужно создать класс в папке предположим комманда Start т.е. Start.php</h3>
<h3>Как должно быть: </h3>


```php
<?php

namespace api\command\commands; //прописать пространство имен

class Start { 
    public function __construct($event) {
            if ($event->getCommand() == '/start') { //проверка на команду
                $event->send("Бот успешно работает!!!"); //отправляет сообщение пользователю!
            }
    }
}
```

<h3>После создания класса нужно добавить комманду в /src/command/Command.php</h3>

```php
 $this->commands = ['Start'];
```

<h3>Пример нескольких комманд: </h3>

```php
 $this->commands = ['Start', 'Profile', 'Test'];
```

