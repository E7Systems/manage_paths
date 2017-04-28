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
			'latitude_ref' => 'N',
			'longitude' => '-122.030796',
			'longitude_ref' => 'W',
			'altitude' => '22.787',
			'dop' => '65',
			'roll' => '0.716386186535759',
			'pitch' => '1.36154727015122',
			'yaw' => '-0.588765280576791',
			'rotation_matrix' => 'CMRotationMatrix(m11: 0.98391306400299072, m12: 0.11536280065774918, m13: -0.13640567660331726, m21: 0.11535710841417313, m22: 0.17275005578994751, m23: 0.97818714380264282, m31: 0.13641050457954407, m32: -0.97818642854690552, m33: 0.15666311979293823)',
			'quaternion' => 'CMQuaternion(x: 0.64313682589218391, y: 0.089685387529852681, z: 1.8720746145584148e-06, w: 0.76048113352103752)',
			'image' => [
				'name' => 'path1.jpg',
				'file' => base64_encode(file_get_contents('../storage/app/public/images/stock/litline.jpg'))
			],
			'image_direction' => '263.1833190917969',
			'points' => [
				0 => [
					'latitude' => '36.974117',
					'longitude' => '-122.030796',
					'altitude' => '22.787',
					'point_captured_at' => '9999-12-31 23:59:59'
				],
				1 => [
					'latitude' => '37.974117',
					'longitude' => '-123.030796',
					'altitude' => '21.787',
					'point_captured_at' => '9999-12-31 23:59:59'
				],
				2 => [
					'latitude' => '40.974117',
					'longitude' => '-119.030796',
					'altitude' => '20.787',
					'point_captured_at' => '9999-12-31 23:59:59'
				],
				2 => [
					'latitude' => '38.974117',
					'longitude' => '-123.030796',
					'altitude' => '18.787',
					'point_captured_at' => '9999-12-31 23:59:59'
				]
			],
			'photo_taken_at' => '9999-12-31 23:59:59'
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
