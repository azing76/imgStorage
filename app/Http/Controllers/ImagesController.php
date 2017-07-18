<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Image;
use App\Http\Requests\Image\NewRequest;
use Auth;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      // if($filter == 1){
      //   $imagesPrivate = Image::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
      // }
      $order = $request->input('order');
        switch ($order) {
          case 'date':
            $imagesPrivate = Image::where('user_id',Auth::user()->id)->orderBy('created_at','ASC')->get();
            break;

          case 'size' :
            $imagesPrivate = Image::where('user_id',Auth::user()->id)->orderBy('size','DESC')->get();
            break;

          case 'title' :
            $imagesPrivate = Image::where('user_id',Auth::user()->id)->orderBy('title','ASC')->get();
            break;

          case 'random' :
            $imagesPrivate = Image::where('user_id',Auth::user()->id)->inRandomOrder()->get();
            break;

          default:
            $imagesPrivate = Image::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
            break;
        }




      return view('images.index',compact('imagesPrivate'));
      // return view('images.index');
    }

    public function publique(Request $request)
    {
      $order = $request->input('order');
        switch ($order) {
          case 'date':
            $imagesPublic = Image::where('public',1)->orderBy('created_at','ASC')->get();
            break;

          case 'size' :
            $imagesPublic = Image::where('public',1)->orderBy('size','DESC')->get();
            break;

          case 'title' :
            $imagesPublic = Image::where('public',1)->orderBy('title','ASC')->get();
            break;

          case 'random' :
            $imagesPublic = Image::where('public',1)->inRandomOrder()->get();
            break;

          default:
            $imagesPublic = Image::where('public',1)->orderBy('created_at','DESC')->get();
            break;
        }



      // $imagesPublic = Image::where('public',1)->get();
      return view('images.publique',compact('imagesPublic'));
      // return view('images.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $name_picture = str_slug($request->input('title')).'.'.$request->file('image')->getClientOriginalExtension();
      $size_picture = $request->file('image')->getClientSize();
      try{
        DB::beginTransaction();
        $image = Image::create(array_merge($request->all(),['user_id' => Auth::user()->id,'picture'=>$name_picture,'size'=>$size_picture]));

      }catch(Exception $e){
        DB::rollback();
        return redirect(route('images.create'));
      }
      DB::commit();

      $request->file('image')->move('img/imageDB/'.Auth::user()->id.'/',$name_picture);
      // return redirect(route('image.show',$image));
      return redirect(route('images.index'));

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

      $image = Image::findOrFail($id);
      if ($image->user_id == Auth::user()->id) {
        // $image->update($request->all());
        return view('images.edit',compact('image'));
      } else{
        return view('adminlte::errors.403');
      }
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
      $image = Image::findOrFail($id);
      if ($image->user_id == Auth::user()->id) {
        $image->update($request->all());
        return redirect(route('images.index',$image->id));
      } else{
        return view('adminlte::errors.403');
      }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $image = Image::findOrFail($id);
      if ($image->user_id == Auth::user()->id) {
        $image= Image::findOrFail($id);
        $image->delete();
        return redirect(route('images.index'));
      } else{
        return view('adminlte::errors.403');
      }


    }
}
