<?php
declare(strict_types=1);
namespace interfaces;

interface TestInterface
{
	public function setProperty(string $name, $value);
  public function getProperty(string $name);
	public function setPhone(object $phone);
}