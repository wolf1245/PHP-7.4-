<?php
declare(strict_types=1);

use Mockery\Generator\StringManipulation\Pass\ClassNamePass;

/**
 * Задание
 *Есть некий класс User с полями id,name,surname,age,live_coords,is_acvite,last_visited.
 *Id,age => число
 *Name,surname => строки
 *Live_coords => координаты, где живёт, отдельный класс
 *Last_visited => дата, отдельный класс
 *Is_active => bool
 *Значения задаются только через get/set.
 *1. Привести класс в максимально строгий к типам вид.
 *2. Сделать так, чтобы можно было подставить несколько разных реализаций к
 *координатам и дате.
 */

 class User
 {
	private $id;
	private $name;
	private $surName;
	private $age;
	private $liveCoords;
	private $isAcvite;
	private $lastVisited;

	public function setPropertyAll(int $id, int $age, string $name, string $surName, array $liveCoords, array $lastVisited, bool $isAcvite)
	{
		$this->id = $id;
		$this->name = $name;
		$this->surName = $surName;
		$this->age = $age;
		$this->liveCoords = $liveCoords;
		$this->isAcvite = $isAcvite;
		$this->lastVisited = $lastVisited;
	}

	public function getProperty(string $name)
	{
		return $this->$name;
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

 $user = new User();
 $user->setPropertyAll(1, 16, 'Lost', 'First', ['className1' => 'class', 'className2' => 'class'], ['className1' => 'class', 'className2' => 'class'], true);