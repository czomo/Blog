<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Artyk;

class ArtykulController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['artyks','index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Artyk::orderByDesc('created_at')->paginate(4);
        return view('page.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'image'=>'image|nullable|max:1500'
        ]);

        if($request->hasFile('image')){
            $fileblank=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($fileblank,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $filenameStore=$filename.'_'.time().'.'.$extension;
            $path=$request->file('image')->storeAs('public/images',$filenameStore);
        } else {
            $filenameStore='brak.jpg';
        }

        $post=new Artyk;
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id=auth()->user()->id;
        $post->image=$filenameStore;
        $post->save();
        return redirect('/artyks')->with('success','Dodano artykul');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Artyk::find($id);
        return view('page.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Artyk::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/artyks')->with('error','Zaloguj się');
        }
        return view('page.edit')->with('post',$post);


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
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);

        if($request->hasFile('image')){
            $fileblank=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($fileblank,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $filenameStore=$filename.'_'.time().'.'.$extension;
            $path=$request->file('image')->storeAs('public/images',$filenameStore);
        } 

        $post=Artyk::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        if($request->hasFile('image')){
            $post->image=$filenameStore;
        }
        if(auth()->user()->id !== $post->user_id){
            return redirect('/artyks')->with('error','Zaloguj się');
        }
        $post->save();
        return redirect('/artyks')->with('success','Uaktualniono artykul');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Artyk::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/artyks')->with('error','Zaloguj się');
        }
        if($post->image!='brak.jpg'){
            Storage::delete('/public/images/'.$post->image);
        }
        $post->delete();
        return redirect('/artyks')->with('success','Usunięto artykul');
    }
}
