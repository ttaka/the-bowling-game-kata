## 概要

* Bowling Game KataをPHPおよびPHPUnitを使用して実装
* 型を忠実にトレース

## 実行方法

PHPUnitの取得

    wget https://phar.phpunit.de/phpunit.phar
	chmod +x phpunit.phar

ユニットテストの実行

    ./phpunit.phar --colors --bootstrap src/Game.php tests/BowlingGameTest.php
