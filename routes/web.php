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

	$paths = '[{"points":[{"latitude":40.66311480347314,"point_captured_at":"2017-04-28 21:10:21","longitude":-122.3525886366664,"altitude":206.0106964111328},{"latitude":40.66311480347314,"point_captured_at":"2017-04-28 21:10:21","longitude":-122.3525886366664,"altitude":206.0106964111328},{"latitude":40.66311480347314,"point_captured_at":"2017-04-28 21:10:21","longitude":-122.3525886366664,"altitude":206.0106964111328},{"latitude":40.66311480347314,"point_captured_at":"2017-04-28 21:10:21","longitude":-122.3525886366664,"altitude":206.0106964111328}],"quaternion":"CMQuaternion(x: 0.4896854418882739, y: -0.025223668841095823, z: -0.0029643131486642889, w: 0.87152920053228122)","dop":32,"roll":"-0.0789335125484672","image_direction":275.8385009765625,"latitude_ref":"N","longitude_ref":"W","altitude":235.8309569715997,"photo_taken_at":"2017-05-11 17:46:12","latitude":40.66315495804911,"pitch":"1.02304912207484","rotation_matrix":"CMRotationMatrix(m11: 0.99870997667312622, m12: -0.029870297759771347, m13: 0.041063163429498672, m21: -0.019536357372999191, m22: 0.52039873600006104, m23: 0.85369986295700073, m31: -0.046869490295648575, m32: -0.85340076684951782, m33: 0.51914387941360474)","longitude":122.3526714305199,"yaw":"0.0375235056909007"},{"points":[{"latitude":40.66311480347314,"point_captured_at":"2017-04-28 21:10:21","longitude":-122.3525886366664,"altitude":206.0106964111328},{"latitude":40.66311480347314,"point_captured_at":"2017-04-28 21:10:21","longitude":-122.3525886366664,"altitude":206.0106964111328},{"latitude":40.66311480347314,"point_captured_at":"2017-04-28 21:10:21","longitude":-122.3525886366664,"altitude":206.0106964111328},{"latitude":40.66311480347314,"point_captured_at":"2017-04-28 21:10:21","longitude":-122.3525886366664,"altitude":206.0106964111328}],"quaternion":"CMQuaternion(x: 0.4896854418882739, y: -0.025223668841095823, z: -0.0029643131486642889, w: 0.87152920053228122)","dop":32,"roll":"-0.0789335125484672","image_direction":275.8385009765625,"latitude_ref":"N","longitude_ref":"W","altitude":235.8309569715997,"photo_taken_at":"2017-05-11 17:46:12","latitude":40.66315495804911,"pitch":"1.02304912207484","rotation_matrix":"CMRotationMatrix(m11: 0.99870997667312622, m12: -0.029870297759771347, m13: 0.041063163429498672, m21: -0.019536357372999191, m22: 0.52039873600006104, m23: 0.85369986295700073, m31: -0.046869490295648575, m32: -0.85340076684951782, m33: 0.51914387941360474)","longitude":122.3526714305199,"yaw":"0.0375235056909007"}]';
	
	#$paths = '[{"points":[{"latitude":40.66311480347314,"point_captured_at":"2017-04-28 21:10:21","longitude":-122.3525886366664,"altitude":206.0106964111328},{"latitude":40.66311480347314,"point_captured_at":"2017-04-28 21:10:21","longitude":-122.3525886366664,"altitude":206.0106964111328},{"latitude":40.66311480347314,"point_captured_at":"2017-04-28 21:10:21","longitude":-122.3525886366664,"altitude":206.0106964111328},{"latitude":40.66311480347314,"point_captured_at":"2017-04-28 21:10:21","longitude":-122.3525886366664,"altitude":206.0106964111328}],"quaternion":"CMQuaternion(x: 0.4896854418882739, y: -0.025223668841095823, z: -0.0029643131486642889, w: 0.87152920053228122)","dop":32,"roll":"-0.0789335125484672","image_direction":275.8385009765625,"latitude_ref":"N","longitude_ref":"W","altitude":235.8309569715997,"photo_taken_at":"2017-05-11 17:46:12","latitude":40.66315495804911,"pitch":"1.02304912207484","rotation_matrix":"CMRotationMatrix(m11: 0.99870997667312622, m12: -0.029870297759771347, m13: 0.041063163429498672, m21: -0.019536357372999191, m22: 0.52039873600006104, m23: 0.85369986295700073, m31: -0.046869490295648575, m32: -0.85340076684951782, m33: 0.51914387941360474)","longitude":122.3526714305199,"yaw":"0.0375235056909007"}]';
	
	#dd(base64_encode(file_get_contents('../storage/app/public/images/stock/litline.jpg')));
	
	$url = "http://pathmanager.dev/api/paths";
	
	$http_client = new Client;
	
	$http_request = $http_client->post($url,[
		
		'json' => [
			
			$paths
			
		]
		
	]);

	return $http_request->getBody();
	
});
