<?php

namespace App\Http\Controllers;

use App\Novel;
use Illuminate\Http\Request;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $novels = Novel::latest()->paginate(5);
  
        return view('novels.index',compact('novels'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novels.create');
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
            'content' => 'required',
        ]);
  
        Novel::create($request->all());
   
        return redirect()->route('novels.index')
                        ->with('success','novel created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function show(Novel $novel)
    {
        return view('novels.show',compact('novel'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function edit(Novel $novel)
    {
        return view('novels.edit',compact('novel'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Novel $novel)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
  
        $novel->update($request->all());
  
        return redirect()->route('novels.index')
                        ->with('success','novel updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Novel $novel)
    {
        $novel->delete();
  
        return redirect()->route('novels.index')
                        ->with('success','novel deleted successfully');
    }
}
