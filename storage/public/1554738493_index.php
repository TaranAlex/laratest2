<?php 

/*$my_variable = 100;
echo $my_variable;*/

/*$a = 10;
$b = 5;
echo $a;
echo '<hr>';
echo $b;*/

/*$c = array(1,2,3,4,5,6,7);
echo $c[3];*/

/*$d = array(
	name => 'Alex',
	surname => 'Taran',
	age => 36,
	education => array(
		'school',
		'colledge',
	)

);
echo $d[education][1];*/

/*$a = 100;
echo 'tesr: $a<br>';
echo "test: $a<br>";
echo $a;
echo '<br>';
echo "$a";*/

/*$name = 'Alex';
$surname = 'Taran';
echo $name . ' ' . $surname;*/

/*echo 1081 % 2;*/

 ?>

<?php 

	/*define ('PI', 3.14);*/
	/*const PI = 3.14;

	echo 'Число пи'. ' '. PI . ' ' . '- это константа' ;*/

	/*$int = 1;
	$float = 32.123;
	$str = 'Hello World';
	$bool = true;

	echo $int;*/

	/*$news = [ 	['title' => 'заголовок',
				'content' => 'контент',
				'views' => 'количество просмотров'
				],
				['title' => 'заголовок',
				'content' => 'контент',
				'views' => 'количество просмотров'
				],
				['title' => 'заголовок',
				'content' => 'контент',
				'views' => 'количество просмотров'
				]
			];

	var_dump($news);*/

/*$str = 'Hello World';
echo $str;

echo '<br>';

$str = null;
unset($str);
var_dump($str);*/

/*$int = 1;
var_dump($int);
echo '<br>';
$int = (string)$int;
var_dump($int);*/


/*$str = 'false';
var_dump($str);
echo '<br>';
$str = (boolean)$str;
var_dump($str);*/

/*$bool = true;
var_dump($bool);
echo '<br>';
$bool = (int)$bool;
var_dump($bool);*/

/*$str = '123abcd';
var_dump($str);
echo '<br>';
$str = (int)$str;
var_dump($str);*/


/*$a = 5;
$b = 4;
$exp = 3;
$sign = '**exp';

while (true) {
    if ($sign === '+') {
		echo $a + $b;    	
    }elseif ($sign === '-') {
    	echo $a - $b;    
    }elseif ($sign === '/' && $b != 0) {
    	echo $a / $b;    
    }elseif ($sign === '*') {
    	echo $a * $b;    
    }
    elseif ($sign === '**exp') {
    	echo pow($a, $exp);    
    }else{
    	echo 'error';
    }
    break;
}*/


/*$limit = 10;
$aliquot = 5;
$multiples = 0;
for ($i = 1; $i <= $limit; $i++) {
	if ($i % $aliquot === 0) {
		echo $i;
		echo '<br>';
		$multiples++;
	}
}
for ($i = 1; $i <= $limit ; $i++) {
	if ($multiples === 0) {
		echo 'Чисел, кратных'.' '.$aliquot.' '.'нет';
		break;
	}		
}	
	echo '<br>';
	echo $multiples;*/


/*$news = ['title' => 'заголовок',
		'content' => 'контент',
		'views' => 'количество просмотров'
		];
				
			
	foreach ($news as $key => $value) {
		echo "$key: $value <br>";
	}*/


/*$news = [ 	['title' => 'заголовок1',
				'content' => 'контент1',
				'views' => 'количество просмотров1'
				],
				['title' => 'заголовок2',
				'content' => 'контент2',
				'views' => 'количество просмотров2'
				],
				['title' => 'заголовок3',
				'content' => 'контент3',
				'views' => 'количество просмотров3'
				]
			];


	foreach ($news as $base_value){
		foreach ($base_value as $key => $value) {
			echo "$key: $value <br>";
		}
	}*/


/*$limit = 10;
$aliquot = 5;
$multiples = 0;

for ($i = 1; $i <= $limit; $i++) {
	if ($i % $aliquot === 0) {
		echo $i;
		echo '<br>';
		$multiples++;
	}
}		
if ($multiples === 0) {
	echo 'Чисел, кратных'.' '.$aliquot.' '.'нет';
}	
echo '<br>';
echo $multiples;*/


/*14*** Написать генератор примеров для учеников младшей школы. Необходимо указать в переменные:

необходимое кол-во примеров;
список допустимых операций из возможных (сложение, вычитание, умножение, деление). не обязательно все
параметр, нужно ли выводить ответ.
диапазон чисел (min, max) с которыми можно работать. Например от 0 до 100.
На выходе должны получить сгенерированый случайным образом список примеров в виде:

если ответ нужно выводить:
  1 + 1 = 2;
  2 * 3 = 6;
  6 / 3 = 2;
  ...
если ответ НЕ нужно выводить:
  1 + 1 = __;
  2 * 3 = __;
  6 / 3 = __;
  ...
14***** Необходимо случайным образом пропускать одно из чисел или знак, например:

    1 + 1 = __;
    2 * __ = 6;
    __ / 3 = 3;
    4 __ 2 = 8;*/

/*$countExemples = 5;
$operations = ['+', '-', '*', '/'];
$answer = false;
$minNumber = 0;
$maxNumber = 100;

$randomNumber1 = mt_rand($minNumber, $maxNumber);
echo $randomNumber1;
echo '<br>';

$randomNumber2 = mt_rand($minNumber, $maxNumber);
echo $randomNumber2;
echo '<br>';

$randomOperation = array_rand($operations);
echo $operations[$randomOperation];
echo '<br>';


if ($answer === true) {
	if ($operations[$randomOperation] === '+') {
		for ($i = 1; $i <= $countExemples ; $i++) {
		echo $randomNumber1.' '.$operations[$randomOperation].' '.$randomNumber2.' '.'='.' '.($randomNumber1 + $randomNumber2);
		echo '<br>';	
		$randomNumber1 = mt_rand($minNumber, $maxNumber);
		$randomNumber2 = mt_rand($minNumber, $maxNumber);
		}
	}
	elseif ($operations[$randomOperation] === '-') {
		for ($i = 1; $i <= $countExemples ; $i++) {
		echo $randomNumber1.' '.$operations[$randomOperation].' '.$randomNumber2.' '.'='.' '.($randomNumber1 - $randomNumber2);
		echo '<br>';
		$randomNumber1 = mt_rand($minNumber, $maxNumber);
		$randomNumber2 = mt_rand($minNumber, $maxNumber);	
		}
	}
	elseif ($operations[$randomOperation] === '*') {
		for ($i = 1; $i <= $countExemples ; $i++) {
		echo $randomNumber1.' '.$operations[$randomOperation].' '.$randomNumber2.' '.'='.' '.($randomNumber1 * $randomNumber2);
		echo '<br>';
		$randomNumber1 = mt_rand($minNumber, $maxNumber);
		$randomNumber2 = mt_rand($minNumber, $maxNumber);	
		}
	}
	elseif ($operations[$randomOperation] === '/' && $randomNumber2 !== 0) {
		for ($i = 1; $i <= $countExemples ; $i++) {
		echo $randomNumber1.' '.$operations[$randomOperation].' '.$randomNumber2.' '.'='.' '.($randomNumber1 / $randomNumber2);
		echo '<br>';
		$randomNumber1 = mt_rand($minNumber, $maxNumber);
		$randomNumber2 = mt_rand($minNumber, $maxNumber);	
		}
	}
}else {
	if ($operations[$randomOperation] === '+') {
		for ($i = 1; $i <= $countExemples ; $i++) {
		echo $randomNumber1.' '.$operations[$randomOperation].' '.$randomNumber2.' '.'='.' '.'____';	
		echo '<br>';	
		$randomNumber1 = mt_rand($minNumber, $maxNumber);
		$randomNumber2 = mt_rand($minNumber, $maxNumber);
		}
	}
	elseif ($operations[$randomOperation] === '-') {
		for ($i = 1; $i <= $countExemples ; $i++) {
		echo $randomNumber1.' '.$operations[$randomOperation].' '.$randomNumber2.' '.'='.' '.'____';
		echo '<br>';
		$randomNumber1 = mt_rand($minNumber, $maxNumber);
		$randomNumber2 = mt_rand($minNumber, $maxNumber);	
		}
	}
	elseif ($operations[$randomOperation] === '*') {
		for ($i = 1; $i <= $countExemples ; $i++) {
		echo $randomNumber1.' '.$operations[$randomOperation].' '.$randomNumber2.' '.'='.' '.'____';
		echo '<br>';
		$randomNumber1 = mt_rand($minNumber, $maxNumber);
		$randomNumber2 = mt_rand($minNumber, $maxNumber);	
		}
	}
	elseif ($operations[$randomOperation] === '/' && $randomNumber2 !== 0) {
		for ($i = 1; $i <= $countExemples ; $i++) {
		echo $randomNumber1.' '.$operations[$randomOperation].' '.$randomNumber2.' '.'='.' '.'____';
		echo '<br>';
		$randomNumber1 = mt_rand($minNumber, $maxNumber);
		$randomNumber2 = mt_rand($minNumber, $maxNumber);	
		}
	}
}*/


/*$strRandomNumber1 = (string)$randomNumber1;
			$strRandomNumber2 = (string)$randomNumber2;
			$strOperation = (string)$operations[$randomOperation];
			$strExsemles = $strRandomNumber1.' '.$strOperation.' '.$strRandomNumber2.' '.'='.' '.'____';
		echo str_shuffle($strExsemles);*/




class Report 
{
	public $id;
	public $name;
	public $content;
	public $createDate; 
	public $editionNumber;
	public $editingDate;


	public function __construct($id, $name)
	{
		$this->id = $id;
		$this->name = $name;
	}

	public function getFio()
	{
		
	}
}





?>

