<?php
declare(strict_types=1);
/**
 *Задание
*Напишите класс калькулятор, наследники которого умеют:
*1. считать и выводить отчет, а не просто число
*2. считать, и писать в файл, что класс Х обсчитывал такие-то данные
 */

class Canc
 {
	 protected $number1;
	 protected $number2;
	 protected $sing;
	 protected $rezult;
	 protected $error = '';
	 protected const FILEPATH = '/log.txt';
	 protected $array = ['addition' => '+', 'subtraction' => '-', 'division' => '/', 'multiplication' => '*',];

	 public function __construct($number1, $sing, $number2)
	 {
		$this->number1 = $number1;
		$this->number2 = $number2;
		$this->sing = $sing;
	 }

	 protected function getRezult() : string
	 {
		foreach ($this->array as $key => &$value) {
			if($value === $this->sing) {
				$this->setLog();
				$this->$key;
				break;
			} else {
				$this->rezult = "Пытаетесть выполнить операцию с знаком: $this->sing.Нет такого знака!";
			}
		}
		return $this->rezult;
	 }

	 protected function setLog()
	 {
		$mode = '';
		if(file_exists($_SERVER['DOCUMENT__ROOT'] . self::FILEPATH)) {
			$mode = 'a';
		} else {
			$mode = 'a+';
		}
		$file = fopen($_SERVER['DOCUMENT__ROOT'] . self::FILEPATH, $mode);
		fwrite($file, "Класс имя:  " . static::class .", делал следующию операцию: $this->rezult\r\n");
		fclose($file);
		if($file == false) {
			$this->rezult = "Что то пошло не так!!!Результат не сохранен";
		}
	 }

	 protected function addition()
	 {
		$this->rezult = "сложение $this->number1 и  $this->number2 = " . ($this->number1 +  $this->number2);
	 }

	 protected function subtraction()
	 {
		$this->rezult = "вычетание из $this->number1,  $this->number2 = " . ($this->number1 -  $this->number2);
	 }

	 protected function multiplication()
	 {
		$this->rezult = "умножение $this->number1 на  $this->number2 = " . ($this->number1 *  $this->number2);
	 }

	 protected function division()
	 {
			if($this->number2 == 0) {
				$this->rezult = "деление $this->number1 на  $this->number2 = " ."Делить на ноль нельзя!";
			} else {
				$this->rezult = "деление $this->number1 на  $this->number2 = " . ($this->number1 /  $this->number2);
			}
	 }
 }