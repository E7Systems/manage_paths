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


	/**
	* Adds path to DB
	*
	* @return json
	*/
	
	public function store (Request $request) {

		#!!! Must hand image upload !!!#
		
		$status  []
		
		$paths = $request->get('paths');
		
		if (empty($paths)) {
			
			$status = ['status' => 'failure', 'message' => 'no paths to add.'];

			return response()->json($status);
			
		}

		foreach ($paths as $path) {

			$new_path = new Path($path);

			$new_path->save();

			foreach ($path['points'] as $point) {

				$new_point = new Point($point);

				$new_point->path_id = $new_path->id; // Should refactor and have saved as relationship

				$new_point->save();

			}

		}
		
		$status = ['status' => 'success', 'message' => 'paths have been added to database.'];

		return response()->json($status);
		
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
