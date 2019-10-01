# Chat Proto
This is a simple chat system simulator designed to connect client and server with multiple protocols.(Currently only mock protocol is implemented)

## Execution
```
# Obtaining code
git clone https://github.com/tomnt/chatproto

# Moving to repository directory
cd chatproto/

# Obtaining dependencies
composer install

# Running Demo
php Main.php

# Running UnitTest
./vendor/bin/phpunit --bootstrap ./vendor/autoload.php ./src/tests/
```

## Outcome of the execution
```
Zhe said;
  0 : 2019-09-27T12:56:41-0700 : Zhe : C1 : Good morning, C one.
  1 : 2019-09-27T12:56:41-0700 : Zhe : C2 : Hello C two
Messages on C1
  0 : 2019-09-27T12:56:41-0700 : Zhe : C1 : Good morning, C one.
  2 : 2019-09-27T12:56:41-0700 : Tom : C1 : Buenos días, C uno.
Channels Zhe is in;
  C1
  C2
Members in channel, C1
  Zhe
  Tom
```

## System Requirements
- [PHP 7.0 or higher](https://www.php.net/downloads.php)
- [Git(CLI client)](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
- [Composer](https://getcomposer.org/download/)