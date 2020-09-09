<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->paginate(5);
  
        return view('news.index',compact('news'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'content' => 'required',
        ]);

        $request['user_id'] = \Auth::user()->id;
  
        News::create($request->all());
   
        return redirect()->route('news.index')
                        ->with('success','News created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news.show',compact('news'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news.edit',compact('news'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'content' => 'required',
        ]);
  
        $news->update($request->all());
  
        return redirect()->route('news.index')
                        ->with('success','News updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
  
        return redirect()->route('news.index')
                        ->with('success','News deleted successfully');
    }
}
