<?php
declare(strict_types=1);
/**
 * Задание
 * Реализовать класс, который сериализует и десериализует данные в формат json.
 */

class Test
{
	public $name = 1;
	private $test = 2;

	public function getProperty()
	{
		return 3;
	}
}

final class SerelizeJSON
{
	private $data;

	public function setData(object $name)
	{
		$this->data = json_encode(serialize($name));
	}

	public function getData() : string
	{
		return $this->data;
	}

	final public function __set(string $name, $value)
	{
		die("Вы пытаетесь записать несуществующеее свойство! $name");
	}

	final public function __get(string $name)
	{
		die("Вы пытаетесь вызвать несуществующеее свойство! $name");
	}
}

$test = new Test();
$serelizeJson = new SerelizeJSON();
$serelizeJson->setData($test);
echo $serelizeJson->getData();