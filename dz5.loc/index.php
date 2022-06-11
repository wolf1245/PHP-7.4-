<?php
declare(strict_types=1);
/**
 * Задание
*Есть классы для вывода данных – в виде html и в XML.
*Есть класс – новость, который нужно выводить по-разному.
*Реализовать вывод.
 */

 class News
 {
	 protected $title;
	 protected $text;
	 protected $date;
	 protected $author;

	 public function setNews(string $title, string $text, string $date, string $author)
	 {
		$this->title = $title;
		$this->text = $text;
		$this->date = $date;
		$this->author = $author;
	 }

	 public function getNewsXml()
	 {
		echo XML::getXml($this->title, $this->text, $this->date, $this->author);
	 }

	 public function getNewsHtml()
	 {
		$html = new Html();
		echo $html->getHtml($this->title, $this->text, $this->date, $this->author);
	 }
 }

class XML
{
	public static function getXml(string $title, string $text, string $date, string $author) : string
	{
		return "
			<?xml version=\"1.0\" encoding=\"UTF-8\"?>
			<!DOCTYPE body>
			<body>
  			<title>$title</title>
				<p>$text</p>
				<span>$date</span>
				<span>$author</span>
			</body>
		";
	}
}

class Html
{
	public function getHtml(string $title, string $text, string $date, string $author) : string
	{
		return "
			<!DOCTYPE html>
			<html lang=\"en\">
			<head>
				<meta charset=\"UTF-8\">
				<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
				<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
				<title>News</title>
			</head>
			<body>
					<div>
						<title>$title</title>
						<p>$text</p>
						<span>$date</span>
						<span>$author</span>
					</div>
			</body>
			</html>
		";
	}
}

$news= new News();
$news->setNews('Title', 'Text', '11.06.2022', 'Myke Kerri');
$news->getNewsXml();
$news->getNewsHtml();