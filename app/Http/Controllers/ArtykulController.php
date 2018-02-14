<?php

namespace App\Http\Controllers;

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
            'body'=>'required'
        ]);


        $post=new Artyk;
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id=auth()->user()->id;
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


        $post=Artyk::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
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
        $post->delete();
        return redirect('/artyks')->with('success','Usunięto artykul');
    }
}
