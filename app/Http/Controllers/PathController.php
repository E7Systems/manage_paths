<?php

namespace App\Http\Controllers;

use App\Path;
use App\Image;
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
		
		$status = [];
		
		$paths = $request->get('paths');
		
		if (empty($paths)) {
			
			$status = ['status' => 'failure', 'message' => 'no paths to add.'];

			return response()->json($status);
			
		}

		foreach ($paths as $path) {
			
			$image_file = base64_decode($path['image']);
			
			$image_name = time().'.jpg'; // Need to find a way to get extension form base64 string.
			
			$upload_path = config('app.lit_line_path');
			
			if (!file_put_contents($upload_path.$image_name, $image_file)) {

				$status = ['status' => 'failure', 'message' => 'path image is unable to be'];

				return response()->json($status);

			}

			$image = (new Image())->create(['file_name' => $image_name]);

			$new_path = new Path($path);
			
			$new_path->image_id = $image->id;

			$new_path->save();

			foreach ($path['points'] as $point) {

				$new_point = new Point($point);

				$new_point->path_id = $new_path->id;

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
