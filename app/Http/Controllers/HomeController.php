<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Location;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = new Location;
        $location= $location->myLocation();
        return view('manager',compact('location'));
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
        dd($location);
    }
}
