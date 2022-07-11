<?php
declare(strict_types=1);
/**
 * Задание
*Сделать класс, который имеет только геттеры. Сеттеры будут полностью на перегрузке.
*Сделать класс UserLogger, который будет обрабатывать некий массив Users, выбирать оттуда
*подходящие данные, и записывать их в тестовый файл. То есть, в Users есть, например, name, age.
*Я отправляю в конструктор assoc массив с name, age, age2, sur. Вы отбрасываете лишнее, всё что
*осталось - в файл.
 */
class UserLogger
{
	private $name;
	private $surName;
	private $age;
	private $email;
	private $phone;

	public function __construct(array $users)
	{
		$this->checkingProperty($users);
	}

	private function checkingProperty(array $users)
	{
		$file = fopen(__DIR__ . "/log.txt", 'w+');
		foreach ($users as $key => &$value) {
			if(isset($this->$key)) {
				fwrite($file, $propertys[$key] = $value. "\r\n");
			}
		}
		fclose($file);
	}

	public function getPropertyAll(string $name)
	{
		if(isset($this->$name)) {
			echo $this->$name;
		} else {
			echo "No property in this class";
		}
	}
}

$ul = new UserLogger([
	'name' => 'Serg',
	'surName' => 'Andreev',
	'age' => '355',
	'email' => 'dfdf@gmail.com',
	'phone' => '+380502471819',
	'status' => 'true',
	'rol' => 'user',
]);