## 概要

* Bowling Game KataをPHPおよびPHPUnitを使用して実装
* 型をトレースする前に、自分の現状を把握するため、まずは自己流で挑戦
* RequirementsおよびQuick designは参照

## 実行方法

PHPUnitの取得

    wget https://phar.phpunit.de/phpunit.phar
	chmod +x phpunit.phar

ユニットテストの実行

    ./phpunit.phar --colors --bootstrap src/Game.php tests/GameTest.php
