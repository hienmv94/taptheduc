<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Location;
use App\Category;
use Redirect;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = new Location;
        $location=$location->viewAll()->get();
        return view('admin.index',compact('location'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category= Category::all();
        return view('admin.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $location = new Location;
        $location->name=$input['name'];
        $location->address=$input['address'];
        $location->contact=$input['contact'];
        $location->category_id=$input['category_id'];
        $location->area=$input['area'];
        $location->sale=$input['sale'];
        $location->describe=$input['describe'];
        $location->price=$input['price'];
        $location->save();
        return Redirect::to('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = new Location;
        $location= $location->findId($id)->first();
        return view('admin.detail',compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location=new Location;
        $location= $location->findId($id)->first();
        $category=Category::all();
        return view('admin.update',compact('location','category'));
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
        $input= $request->all();
        $data= array(
            'name'=>$input['name'],
            'address'=>$input['address'],
            'contact'=>$input['contact'],
            'describe'=>$input['describe'],
            'sale'=>$input['sale'],
            'price'=>$input['price'],
            'category_id'=>$input['category_id'],
            'area'=>$input['area'],
        );
        Location::find($id)->update($data);
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function action(Request $request){
        $input=$request->all();
        if(isset($input['delete'])){
            $id_xoa=$input['checkbox'];
            foreach ($id_xoa as $id) {
                Location::find($id)->delete();
            }
            
            return Redirect::to('/admin');
        }
        if(isset($input['active'])){
            $id_active=$input['checkbox'];
            foreach ($id_active as $id){
                $query=DB::table('location')->where('id',$id)->update(['actived'=>1]);
            }
            return Redirect::to('/admin');
        }
    }
}
