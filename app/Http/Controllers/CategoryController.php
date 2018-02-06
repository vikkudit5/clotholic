<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use  App\User;
use App\Category;


class CategoryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $categoryList = Category::get();

        return view('admin.categoryList',compact('categoryList'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
      
        $input = array_except($request->all(), '_token');
        $name = $input['name'];

        

        $rules  =  array(
                    'name'       => 'unique:categories|required',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
                   
                       ) ;
         $validator = Validator::make($input, $rules);
        

          //check validation
        if ($validator->fails()) {

             return Redirect::back()->withErrors($validator)->withInput();
        }

         // $imageName = $this->imageHelper->singleImageUpload($request);

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('upload/category'), $imageName);

       $insert_category = Category::create(['name'=>$name,'image'=>$imageName]);
        if($insert_category){

           return Redirect::back()->with('message', '<strong>' .$input['name'] . '</strong> has been created succesfully');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editCategory = Category::find($id);
        return view('admin.editCategory',compact('editCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryid = Category::find($id);
        $file= $categoryid->image;//fetch image
         $filename = public_path().'/upload/category/'.$file;//path of image
         unlink($filename);//delete image from folder
        $deleteCategory = $categoryid->delete();//delete categroy
        if($deleteCategory)
        {
            return 1;
        }else
        {
            return 0;
        }

    }

    public function disable(Request $request)
    {
        

        $statusId = $request->statusId;
        $categoryId = $request->categoryId;
        $updateStatus = Category::where('id',$categoryId)->update(['status'=>$statusId]);
        if($updateStatus)
        {
         
            return 1;
        }else{
            return 0;
        }
    }

    public function enable(Request $request)
    {
        $updateStatus = Category::where('id',$request->categoryId)->Update(['status'=>$request->status_id]);
        if($updateStatus)
        {
            return 1;
        }else{
            return 0;
        }
    }


    public function updateCategory(Request $request)
    {
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('upload/category'),$imageName);
        $updateCategory = Category::where('id',$request->updateId)->update(['name'=>$request->name,'image'=>$imageName]);
        
        if($updateCategory)
        {
            return Redirect::back()->with('message', '<strong>' .$request->name . '</strong> has been updated succesfully');
        }

    }

   
}
