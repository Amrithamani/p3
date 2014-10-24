<?php


Route::get('/', function()
{
	return View::make('index');
});


Route::get('/lorem-ipsum', function()
{
	
	
	return View::make('lorem-ipsum');
	
});

Route::post ('/lorem-ipsum', function(){
	$count = Input::get ( 'paragraphCount');
		if ($count >0 && $count < 20)
		{
		$count = $count;
		}else
		{
		$count = 0;
		}
	$generator = new LoremGenerator();
	$paragraphs = $generator->getParagraphs($count);
	$paragraphData = implode('<p>',$paragraphs);
	return View::make('lorem-ipsum')->with('paragraph',$paragraphData);
});

Route::get('/user-generator', function()
{
	return View::make('user-generator');
});

Route::post('/user-generator', function(){
	$noOfUsers = Input::get('users');

$birthday = Input::get('birthday');
$address = Input::get('profile');
$faker = Faker\Factory::create();

// Support only ten users
if ($noOfUsers < 1 || $noOfUsers > 10){
$noOfUsers = 0;
}
for ($i = 0; $i < $noOfUsers; $i++){
	$dataToSend[$i]['name'] = $faker->name;
	
	if($birthday){
		$dataToSend[$i]['birthday'] = date_format($faker->dateTime, 'Y-m-d');
	}else{
		$dataToSend[$i]['birthday'] = NULL;
	}	
	
	if ($address){
		$dataToSend[$i]['address'] = $faker->address;
		$dataToSend[$i]['city'] = $faker->city;
		$dataToSend[$i]['state'] = $faker->state;
		}else{
		$dataToSend [$i]['address'] = NULL;
		$dataToSend[$i]['city'] = NULL;
		$dataToSend[$i]['state'] = NULL;

	}
}	

return View::make('user-generator')->with('data',$dataToSend);
});