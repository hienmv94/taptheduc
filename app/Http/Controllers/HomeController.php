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
use App\User;
use Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manager()
    {
        $location = new Location;
        $location= $location->myLocation(session('user_email'));
        return view('user.manager',compact('location'));
    }

    public function search(Request $request){
        $input= $request->all();
        Session::put('input',$input);
        return redirect('ketqua');
    }
    public function result(){
        $input= session('input');
        $location= new Location;
        $location=$location->search($input['search'],$input['optionSort'],$input['optionSize'])->get();
        return view('home',compact('location'));
    }
    public function index(){
        $location= new Location;
        $location = $location->viewAll()->get();

        return view('home',compact('location'));
    }

    public function create(){
        $category= Category::all();
        return view('user.create',compact('category'));
    }

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
        $user= new User;
        $user= $user->findEmail(session('user_email'));
        $location->user_id=$user->id;
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
       return Redirect::to('quanlydiadiem');
   }

   public function show($id)
    {
        $location = new Location;
        $location= $location->findId($id)->first();
        $picture= new Image;
        $picture= $picture->findId($id)->get();
        return view('user.detail',compact('location','picture'));
    }

    public function edit($id)
    {
        $location=new Location;
        $location= $location->findId($id)->first();
        $category=Category::all();
        return view('user.update',compact('location','category'));
    }
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

    public function editImage($id){
        $images = new Image;
        $images = $images->findId($id)->get();
        $location=new Location;
        $location= $location->findId($id)->first();
        return view('user.updateImage',compact('images','id','location'));
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
