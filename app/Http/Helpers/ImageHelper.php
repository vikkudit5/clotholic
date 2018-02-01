<?php
namespace App\Http\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

trait ImageHelper
{
	

	public function singleImageUpload(Request $Request)
	{

			
		 $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('upload/category'), $imageName);
	}
}

?>