<?php
declare(strict_types=1);
/**
 * Задание
*Возьмите любой удобный себе класс с 5+ свойств, напишите к нему геттеры и сеттеры. Во время
*работы ещё раз внимательно посмотрите на понятия внутреннего состояния.
 */

 class Test 
 {
	 private $one;
	 private $too;
	 private $three;
	 private $foo;
	 private $five;
	 private $six;
	 private $seven;

	 public function setMyAll($array = [])
	 {
		foreach ($array as $key => &$value) {
			$this->$key = $value;
		}
	 }

	 public function getMy(string $name)
	 {
		return $this->$name;
	 }
 }

 $test = new Test();
 $test->setMyAll([
	 'one' => '1',
	 'too' => '2',
	 'three' => '3',
	 'foo' => '4',
	 'five' => '5',
	 'six' => '6',
	 'seven' => '7',
 ]);
 echo $test->getMy('too');