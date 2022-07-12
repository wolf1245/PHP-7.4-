<?php
declare(strict_types=1);
namespace classes;

final class Test implements \interfaces\TestInterface
{
	private $name;
	private $surName;
	private $phone;

	public function setProperty(string $name, $value)
	{
		if(property_exists($this, $name)) {
			$this->$name = $value;
		} else {
			echo 'Вы пытаетесь не существующее свойтсво!!';
		}
	}

	public function setPhone(object $phone)
	{
		$this->phone = $phone->phone();
	}

	public function getProperty(string $name)
	{
		if(property_exists($this, $name)) {
			$this->$name;
		} else {
			echo 'Вы пытаетесь обратиться к несуществующему свойству!';
		}
	}

	final public function __set(string $name, $value)
	{
		die('Нет такого свойства для записи!');
	}

	final public function __get(string $name)
	{
		die('Нет такого свойства для чтения!');
	}
}