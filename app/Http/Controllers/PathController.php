<?php

namespace App\Http\Controllers;

use App\Path;
use App\Image;
use App\Point;
use Illuminate\Support\Facades\Log;
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
		
		Log::info('REWUEST OBJECT: '.$request->getContent());
		$status = [];
		
		if ($request->header('content-type') !== "application/json") {
			
			return $this->apiResponse('error','Header type must be "application/json". Header Supplied is ' . $request->header('content-type'),$request->header());
			
		}
		
		if ($request->isJson()) {
			
			$post_data = $this->parseForPostman(json_decode($request->getContent(),true));
			
		} else {
			
			return $this->apiResponse('error','Unable to find JSON string.',$request->all()); // WTF
			
		}
		
		if (empty($post_data)) {
			
			return $this->apiResponse('failure','No paths found in JSON object',$post_data);
			
		}
		
		foreach ($post_data as $path) {
			if (isset($path['image'])){	
				$image_file = base64_decode($path['image']['file']);
				
				$image_name = time().$path['image']['name']; // Need to find a way to get extension form base64 string.

				$upload_path = config('app.lit_line_path');
				
				if (!file_put_contents($upload_path.$image_name, $image_file)) {

					$status = ['status' => 'failure', 'message' => 'path image is unable to be moved'];

					return response()->json($status);

				}

				$image = (new Image())->create(['file_name' => $image_name]);
				$image_id = $image->id;
		        } else {
				$image_id = 24;
			}	
			
			$new_path = new Path;

			$new_path->image_id = $image_id;
			
			$new_path->fill($path);

			//$new_path->image_id = 24;

			$new_path->save();
			



			#return $path['points'][2];

			foreach ($path['points'] as $point) {


				$new_point = new Point;
				
				$new_point->fill($point);

				$new_point->path_id = $new_path->id;

				$new_point->save();

			}

		}
		
		return $this->apiResponse('success','paths have been added to database.',$post_data);
		
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
    
    
    /**
     * Return JSON object with API details.
     *
     * @return json
     */
     
    private function apiResponse($status,$message,$content)
    {
		$error = [
			'status' => $status,
			'message' => $message,
			'content' => $content
		];
		
		return response()->json($error);
    }
    
    /**
     * Pull and returns the proper JSON string out of the array.
     *
     * Postman & Guzzle/HTTP to not deliver JSON POSTs with the same format.
     *
     * @return json
     */
    private function parseForPostman($data)
    {
	    if (isset($data["paths"]) && $data["paths"]) {
		return $data["paths"];
	    }elseif ((count($data) > 1) || (gettype($data[0]) == "array")) {
		    	
		    // Postman returning unwrapped set of paths
		    
		    return $data;
		    
	    } else {
		    
		    // Guzzle/HTTP returnign data wrapped in array
		    
		    return json_decode($data[0],true);
		    
	    }
	    
    }
    
}
