<?php
declare(strict_types=1);
ob_start();
session_start();
/**
 * Задание
*Создать 5 классов со свойствами и методами.
*Самостоятельная деятельность учащегося
*Задание
*Написать классы:
*Hello word - класс, который будет делать echo, если будет вызван нужный метод.
*Калькулятор. Он должен уметь делать 4 базовые математические операции.
 */
$arrayAtributeValueText = ['text' => 'Текст', 'submit' => 'submit'];
$arrayAtributeKeyText = array_keys($arrayAtributeValueText);
$arrayAtributeValueCalculator = [
	'number1' => 'Значение 1',
	'condition' => 'Условие',
	'number2' => 'Значение 2',
];
//
class EmptyInput
{
	public static $rezult = '';

	public static function setEmptyInputs()
	{
		foreach ($_POST as $key => &$value) {
			if($key == 'submit') {
				continue;
			}
			if(empty($value) && $value != 0) {
				self::$rezult = $key;
			} else {
				self::$rezult = '';
			}
		}
	}

	public static function getEmptyInputs()
	{
		return self::$rezult;
	}
}
//
class CheckError
{
	public $response;

	public function __construct(string $text = '')
	{
		$this->response = $text;
	}

	public function getRezult () : string
	{
		return $this->response;
	}
}
//
class EchoScreen
{
	public static $textEcho;

	public static function setEcho($textEcho)
	{
		self::$textEcho = $textEcho;
	}

	public static function getEcho()
	{
		echo self::$textEcho;
	}
}
// Задание 1
// if(isset($_POST['submit'])) {
// 	EmptyInput::setEmptyInputs(); 
// 	if(EmptyInput::getEmptyInputs() == "") {
// 		EchoScreen::setEcho($_POST['text']);
// 	} else {
// 		// Асоциация - в данном случае вид Агрегация
// 		$checkError = new CheckError("Введите текст в поле " . $arrayAtributeValueText[EmptyInput::getEmptyInputs()]);
// 		EchoScreen::setEcho($checkError->getRezult());
// 	}
// }
// Задание 2
class Canc
{
	private $number1;
	private $number2;
	private $condition;
	private $rezult;

	public function __construct()
	{
		$this->number1 = $_POST['number1'];
		$this->number2 = $_POST['number2'];
		$this->condition = $_POST['condition'];
		if($this->condition == "+") {
			$this->addition();
		}elseif($this->condition == "-") {
			$this->subtraction();
		}elseif($this->condition == "*") {
			$this->multiplication();
		}elseif($this->condition == "/") {
			$this->division();
		}
	}

	private function addition()
	{
		$this->rezult = ($this->number1 +  $this->number2);
	}

	private function subtraction()
	{
		$this->rezult = ($this->number1 -  $this->number2);
	}

	private function multiplication()
	{
		$this->rezult = ($this->number1 *  $this->number2);
	}

	private function division()
	{
		if($this->number2 == 0) {
			$this->rezult = 0;
		} else {
			$this->rezult = ($this->number1 /  $this->number2);
		}
	}

	public function getRezult()
	{
		return $this->rezult;
	}
}
//
class Condition
{
	public static function checkCondition() : bool
	{
		if($_POST['condition'] == '+' || $_POST['condition'] == '-' || $_POST['condition'] == '*' || $_POST['condition'] == '/')  {
			return true;
		} else {
			return false;
		}
	}

	public static function typeAll() : bool
	{
		if(is_numeric($_POST['number1']) && is_numeric($_POST['number2']))  {
			return true;
		} else {
			return false;
		}
	}
}
//
if(isset($_POST['submit'])) {
	EmptyInput::setEmptyInputs();
	if(EmptyInput::getEmptyInputs() == "") {
		if(Condition::checkCondition()) {
			if(Condition::typeAll()) {
				$canc = new Canc();
				if($canc->getRezult() != 0) {
					EchoScreen::setEcho($canc->getRezult());
				} else {
					// Асоциация - в данном случае вид Агрегация
					$checkError = new CheckError("На 0 делить нельзя");
					EchoScreen::setEcho($checkError->getRezult());
				}
			} else {
				// Асоциация - в данном случае вид Агрегация
				$checkError = new CheckError("Введите пожалуйста только числа");
				EchoScreen::setEcho($checkError->getRezult());
			}
		} else {
			// Асоциация - в данном случае вид Агрегация
			$checkError = new CheckError("Веденное условие не соответствует, можно только *, -, /, +");
			EchoScreen::setEcho($checkError->getRezult());
		}
	} else {
		// Асоциация - в данном случае вид Агрегация
		$checkError = new CheckError(" Введите значение в поле " . $arrayAtributeValueCalculator[EmptyInput::getEmptyInputs()]);
		EchoScreen::setEcho($checkError->getRezult());
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
</head>
<body>
	<!-- <form action="#" method="POST">
		<legend>Вывести на экран!</legend>
		<label>
			Введите фразу чтоб вывести на экран:
			<br>
			<input type="text" name="<?=$arrayAtributeKeyText[0];?>" value="<?=$_POST['text'] ?? '';?>">
		</label>
		<br>
		<input type="submit" name="<?=$arrayAtributeKeyText[1];?>">
	</form> -->
	<form action="#" method="POST">
		<legend>Canc form</legend>
		<label>
			Значение 1 (любая цифра):
			<input type="text" name="number1" value="<?=$_POST['number1'] ?? '';?>">
		</label>
		<label>
			Условие (+, /, -, *):
			<input type="text" name="condition" value="<?=$_POST['condition'] ?? '';?>">
		</label>
		<label>
			Значение 2 (любая цифра)
			<input type="text" name="number2" value="<?=$_POST['number2'] ?? '';?>">
		</label>
		<input type="submit" name="submit">
	</form>
	<div>Равно:<?php EchoScreen::getEcho();?></div>
	<br>
</body>
</html>