<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Validation\Rule;
class ComicController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $search = $request->query('search');
        $comics= Comic::where('title','LIKE',"%$search%")->get();
        return view('comics.index',compact('comics','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $comic = new Comic();
        return view('comics.create',compact('comic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->sales_date);
        $request->validate([
            'title' => 'required|unique:comics|max:255',
            'description' => 'required|unique:comics|max:1000',
            'thumb' => 'required|unique:comics|max:500',
            'price' => 'required|unique:comics|numeric',
            'thumb' => 'required|unique:comics|max:255',
            'series' => 'required|unique:comics|max:255',
            'sale_date' => 'required|date|unique:comics',
            'type' => 'required|unique:comics|max:255',
        ]);
        $data = $request->all();
    
        $comic= new Comic();
        $comic->fill($data);
        $comic->save();

        return redirect()->route('comics.show',$comic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
   {
        $comic=Comic::withTrashed()->findOrFail($id);
        
        return view('comics.show',compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $comic=Comic::withTrashed()->findOrFail($id);
        return view('comics.edit',compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Comic $comic)
   {    $request->validate([
            'title' => ['required',Rule::unique('comics')->ignore($comic->id),'max:255'],
            'description' => ['required',Rule::unique('comics')->ignore($comic->id),'max:1000'],
            'thumb' => ['required',Rule::unique('comics')->ignore($comic->id),'max:1000'],
            'price' => ['required',Rule::unique('comics')->ignore($comic->id),'max:1000','numeric'],
            'thumb' => ['required',Rule::unique('comics')->ignore($comic->id),'max:1000'],
            'series' => ['required',Rule::unique('comics')->ignore($comic->id),'max:200'],
            'sale_date' => ['required',Rule::unique('comics')->ignore($comic->id),'date'],
            'type' => ['required','max:100']
        ]);
        $data = $request->all();
        $comic->update($data);

        return redirect()->route('comics.show',$comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();
        return redirect()->route('comics.index')->with('delete',$comic->title);
    }

    // public function trash(){
    //     $comics = Comic::onlyTrashed()->get();
    //     return view('comics.trash',compact('comics'));
    // }

    // public function restore($id){
    //    $comic = Comic::withTrashed()->find($id);
    //     $comic->restore();
    //     return redirect()->route('comics.index')->with('restore', $comic->title);
    // }
    // public function forceDelete($id){
    //    $comic = Comic::onlyTrashed()->find($id);
    //    $comic->forceDelete();

    //     return redirect()->route('comics.trash')->with('deleted', $comic->title);
    // }
}
