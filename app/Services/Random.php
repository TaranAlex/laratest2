<?php 

namespace App\Http\Services;

class Random
{
	public static function make()
	{
		return new static(new Random);
	}

	public static function generate(int $min, int $max):int
	{
		return random_int($min, $max);
	}
}


 ?>