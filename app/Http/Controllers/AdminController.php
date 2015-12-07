<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Location;
use App\Category;
use Redirect;
use DB,Input;
use App\Image;

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
        $link=stripUnicode($input['name']);
        $location->name=$input['name'];
        $location->address=$input['address'];
        $location->link=stripUnicode($input['name']).'_'.stripUnicode($input['address']);
        $location->contact=$input['contact'];
        $location->category_id=$input['category_id'];
        $location->area=$input['area'];
        $location->sale=$input['sale'];
        $location->describe=$input['describe'];
        $location->price=$input['price'];
        $location->save();
        foreach ($input['fileAnh'] as $anh){

            if ($anh) {
               $image= new Image;
               $save_up= 'public/images/';
               $_avatar= $location->link;
               $_avatar=rand(0,1000).stripUnicode($_avatar).'.jpg';
               $image->location_id=$location->id;
               $image->link=$save_up.$_avatar;
               $anh->move($save_up, $_avatar);
               $image->save();
           }

       }
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
        $picture= new Image;
        $picture= $picture->findId($id)->get();
        return view('admin.detail',compact('location','picture'));
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
            'link'=>stripUnicode($input['name']).'_'.stripUnicode($input['address']),
            'contact'=>$input['contact'],
            'describe'=>$input['describe'],
            'sale'=>$input['sale'],
            'price'=>$input['price'],
            'category_id'=>$input['category_id'],
            'area'=>$input['area'],
            'actived' => '0',
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

    public function editImage($id){
        $images = new Image;
        $images = $images->findId($id)->get();
        $location=new Location;
        $location= $location->findId($id)->first();
        return view('admin.updateImage',compact('images','id','location'));
    }

    public function updateImage(Request $request,$id){
        $input=$request->all();
        if (isset($input['btnSubmit'])){
        
        $location=new Location;
        $location= $location->findId($id)->first();
        foreach ($input['fileAnh'] as $anh){

            if ($anh) {
               $image= new Image;
               $save_up= 'public/images/';
               $_avatar= $location->link;
               $_avatar=rand(0,1000).stripUnicode($_avatar).'.jpg';
               $image->location_id=$location->id;
               $image->link=$save_up.$_avatar;
               $anh->move($save_up, $_avatar);
               $image->save();
           }

        }} else {
            $id_xoa=$input['checkbox'];
            foreach ($id_xoa as $id) {
                $result=DB::table('images')->where('image_id',$id)->delete();
            }
        }
        return Redirect::back();
    }
}
