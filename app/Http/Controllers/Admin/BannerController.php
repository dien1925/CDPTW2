<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Banner;
use Illuminate\Support\Facades\DB;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Banner::paginate(5);
        $slide = DB::table('banner')->select('slide')->first();
        //$slides = DB::table('banner')->get();
        return view('banner.index',['slide'=>$slide,'slides'=>$slides]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
       $des= 'public/upload';
       $imgname1 = $request->file('slide1')->getClientOriginalName();
       if ($request->file('ads') != null) {
        $imgname2 = $request->file('ads')->getClientOriginalName();
       }
       $banner = new Banner();
       $banner->slide1 = $imgname1;
       if (isset($imgname2)) {
        $banner->ads = $imgname2;
       } else {
        $banner->ads = '';
       }
       $banner->save();
       $request->file('slide1')->move($des,$imgname1);
       if (isset($imgname2)) {
        $request->file('ads')->move($des,$imgname2);
       }
     
      
       return redirect()->route('banner.index');
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
        $banner = Banner::find($id);

        if (!$banner) {
            return redirect()->route('banner.index')->with('error', 'Banner không tồn tại.');
        }
    
        return view('banner.edit', compact('banner'));
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
        $banner = Banner::find($id);

    if (!$banner) {
        return redirect()->route('banner.index')->with('error', 'Banner không tồn tại.');
    }

    $des = 'public/upload';

    if ($request->hasFile('slide1')) {
        $imgname1 = $request->file('slide1')->getClientOriginalName();
        $banner->slide1 = $imgname1;
        $request->file('slide1')->move($des, $imgname1);
    }

    if ($request->hasFile('ads')) {
        $imgname2 = $request->file('ads')->getClientOriginalName();
        $banner->ads = $imgname2;
        $request->file('ads')->move($des, $imgname2);
    }

    $banner->save();

    return redirect()->route('banner.index')->with('success', 'Cập nhật banner thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $banner = Banner::find($id);
        $banner->delete();

        return redirect()->route('banner.index');
    }
}
