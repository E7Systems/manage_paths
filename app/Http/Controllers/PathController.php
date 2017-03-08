<?php

namespace App\Http\Controllers;

use App\Path;
use App\Point;
use Illuminate\Http\Request;

class PathController extends Controller
{
    
    public function __construct(Path $path, Point $point) {
	    
	    $this->path = new $path;
	    
    }
    
    protected $paths = [
	    0 => [
		    'latitude' => '36.974117',
		    'longitude' => '-122.030796',
		    'altitude' => '22.787',
		    'photo_url' => '/images/paths/03-7-2017_16:43:27_santacruz.jpg',
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
			    ],
		    ]
	    ]
    ];
    
    
    /**
    * Adds path to DB
    *
    * @return json
    */
     
    public function store (Request $request) {
	    
	    #!!! Must hand image upload !!!#
	    
	    foreach ($this->paths as $path) {
		    
		    $new_path = $this->path->fill($path);
		    
		    $new_path->save();
		    
		    foreach ($path['points'] as $point) {

			    $new_point = new Point($point);
			    
			    $new_point->path_id = $new_path->id; // Should refactor and have saved as relationship
			    
			    $new_point->save();

		    }
		    
	    }
	    
	    return $path;
    }
    
	
	/**
	* Display specified path with point properties
	*
	* @return json
	*/
     
    public function show ($id)
    {
	    
	    $path = $this->path->with('points')->find($id);
	    
	    return response()->json($path);
	    
    }
    
    
    /**
     * Display all paths with point properties
     *
     * @return json
     */
     
     public function index ()
    {
	    
	    $paths = $this->path->with('points')->get();
	    
	    return response()->json($paths);
	    
    }
    
}
