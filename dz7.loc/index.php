<?php
declare(strict_types=1);
require_once $_SERVER['DOCUMENT_ROOT'] . '/interfaces/TestInterface.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Test.php';
/**
 * Задание
* Попрактиковаться в разделении кода: интерфейс/классы.
* Настроить свой код-редактор (выработать привычку), если не сказано иного – создавать сразу
* финальные классы.
* Повторить пример с анонимным классом.
 */
$test = new \classes\Test();
$test->setProperty('name', 'Elsa');
$test->getProperty('name');
$test->setPhone(new class{
	public function phone()
	{
		return '+380665554719';
	}
});
$test->setProperty('surName', 'Elsa');
$test->getProperty('surName');
$test->setPhone(new class{
	public function phone()
	{
		return '+380665556655';
	}
});