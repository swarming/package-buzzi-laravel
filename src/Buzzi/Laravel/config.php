<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Buzzi Configuration
	|--------------------------------------------------------------------------
	|
	*/

    'api' => [
    	'id'     => env('BUZZI_API_ID',     '<your-buzzi-api-id-here>'),
		'secret' => env('BUZZI_API_SECRET', '<your-buzzi-api-secret-here>')
	]

];