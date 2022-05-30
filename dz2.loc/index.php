<?php
declare(strict_types=1);
/**
 * Задание 1
*Напишите класс – статью. На вход подаются только данные (title, description, author), а вы уже
*должны сделать так, чтобы ФИО автора было с большой буквы, title урезался (если больше) до
*255 символов, description заменял указанные мною отдельно слова на ***
*Задание 2
*Потренируйтесь с константами
*Потренируйтесь со статическими свойствами. Попробуйте их использовать внутри
*обычных/статических методов.
*Потренируйтесь с конструктором/деструктором.
*Задание 3
*Создайте класс “Кибертурнир”, в котором будет единое неизменное название, список игроков,
*возможность перечисления полного имени всех игроков.
*Дополнительное задание
*Задание
*Создайте класс Gamer, который будет принимать в конструкторе данные о игроке, и выдавать их
*по-разному, в зависимости от наших нужд:
*ФИО – ник
*Ф ник И
*И Ф ник
 */
class Article
{
	private $title;
	private $description;
	private $newDescription;
	private $author;
	private $article;

	public function __construct(string $title, array $description = ['description' => '', 'says' => [], 'replacement' => '***'], string $author)
	{
		$this->title = $title;
		$this->description = $description;
		$this->author = $author;
		$this->setCheckTitle();
		$this->setCheckDescription();
		$this->setCheckAuthor();
		$this->setArticle();
	}

	private function setCheckTitle()
	{
		if(strlen($this->title) > 255) {
			$this->title = mb_substr($this->title, 0, 255);
		}
	}

	private function setCheckDescription()
	{
		$this->newDescription = str_replace($this->description['says'], $this->description['replacement'], $this->description['description']);
	}

	private function setCheckAuthor()
	{
		$this->author = ucwords($this->author);
	}

	private function setArticle()
	{
		$this->article = "
			<article>
				<h3>$this->title</h3>
				<p>$this->newDescription</p>
				<span>$this->author</span>
			</article>
		";
	}

	public function getArticle() : string
	{
		return $this->article;
	}
}
$article = new Article('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi ab impedit suscipit odit? Adipisci labore quos culpa recusandae fugit a architecto ut quidem ad suscipit nisi vitae vel, nesciunt natus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi ab impedit suscipit odit? Adipisci labore quos culpa recusandae fugit a architecto ut quidem ad suscipit nisi vitae vel, nesciunt natus.', ['description' => 'Lorem hhh kkk lll', 'says' => ['kkk'], 'replacement' => '***'], 'david area value');
echo $article->getArticle();
//
class Cons
{
	public const  MYPI = 3.14;
	protected const MYPI2 = 3.15;
	private const MYPI3 = 3.16;

	public function __construct()
	{
		$this->getConstMy();
	}

	public static function getConst()
	{
		self::MYPI;
	}

	public function getConstMy()
	{
		self::MYPI3;
	}

	function __destruct()
	{
		print "Уничтожается " . __CLASS__  . "\n";
	}
}
//
class Cybertournament
{
	private const NAME = 'Клоуны';
	private $listPlayer = [['gameNik' => 'Mr.Hide', 'name' => 'Serg']];
	private $listPlayerFullName = ['Mr.Hide' => ['name' => 'Serg', 'surName' => 'Look', 'patronymic' => 'Victorovich']];

	public function getName() : mixed
	{
		return self::NAME;
	}

	public function getListPlayer() : array
	{
		return $this->listPlayer;
	}

	public function getListPlayerFullName() : array
	{
		return $this->listPlayerFullName;
	}
}

class Gamer
{
	private $dataGamer = [
		'name' => 'Serg',
		'surName' => 'Look',
		'patronymic' => 'Victorovich',
		'gameNik' => 'Mr.Hide',
	];
	private $keyDataGamer = [
		'Ф' => 'surName',
		'И' => 'name',
		'О' => 'patronymic',
		'ник' => 'gameNik',
	];
	private $rezult;

	public function getDataGamer(string $dataSort) : string
	{
		$dataSort = explode(' ', $dataSort);
		foreach ($dataSort  as &$value) {
			if(array_key_exists($value, $this->keyDataGamer)) {
				$this->rezult .= $this->dataGamer[$this->keyDataGamer[$value]] . " ";
			} else {
				continue;
			}
		}
		return $this->rezult;
	}
}

$gamer = new Gamer();
echo $gamer->getDataGamer("Ф И О - ник");