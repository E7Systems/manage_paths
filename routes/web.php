<?php

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	
	return view()->make('welcome');
	
});

Route::get('/add_path', function () {
	
	
	$paths = [
		0 => [
			'latitude' => '36.974117',
			'longitude' => '-122.030796',
			'altitude' => '22.787',
			'image' => base64_encode(file_get_contents('../storage/app/public/images/stock/litline.jpg')),
			'points' => [
				0 => [
					'latitude' => '36.974117',
					'longitude' => '-122.030796',
					'altitude' => '22.787'
				],
				1 => [
					'latitude' => '37.974117',
					'longitude' => '-123.030796',
					'altitude' => '21.787'
				],
				2 => [
					'latitude' => '40.974117',
					'longitude' => '-119.030796',
					'altitude' => '20.787'
				],
				2 => [
					'latitude' => '38.974117',
					'longitude' => '-123.030796',
					'altitude' => '18.787'
				]
			]
		],
		1 => [
			'latitude' => '32.974117',
			'longitude' => '-112.030796',
			'altitude' => '25.787',
			'image' => base64_encode(file_get_contents('../storage/app/public/images/stock/litline2.jpg')),
			'points' => [
				0 => [
					'latitude' => '32.974117',
					'longitude' => '-182.030796',
					'altitude' => '12.787'
				],
				1 => [
					'latitude' => '57.974117',
					'longitude' => '-193.030796',
					'altitude' => '24.787'
				],
				2 => [
					'latitude' => '50.974117',
					'longitude' => '-179.030796',
					'altitude' => '26.787'
				],
				2 => [
					'latitude' => '28.974117',
					'longitude' => '-143.030796',
					'altitude' => '16.787'
				]
			]
		]
	];
	
	$url = "http://pathmanager.dev/api/paths";
	
	$http_client = new Client;
	
	$http_request = $http_client->post($url,[
		
		'json' => [
			
			'paths' => $paths
			
		]
		
	]);

	return $http_request->getBody();
	
});
