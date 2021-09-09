<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Portfolio::with("tecnology")->paginate(3);
        return View('portfolio.index', compact('records') );
        // return response()->json($records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'image' => 'required',
            'img_alt_text' => 'required',
            'link' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('image')) {
            $data['image'] = $request->image->store('images');
        }
        
        Portfolio::create($data);
    
        $request->session()->flash('success', "Entry has been successfully!");
    
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Portfolio::findOrFail($id);

        return view('portfolio.edit',compact('record'));
        
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
        $record = Portfolio::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|max:255',
            'image' => 'nullable',
            'img_alt_text' => 'required',
            'link' => 'required',
            'category' => 'nullable',
            'description' => 'nullable',
        ]);
        if($request->hasFile('image')) {
            $data['image'] = $request->image->store('images');
        }

        $record->update($data);

        return redirect(route('portfolio.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Portfolio::findOrFail($id);

        if (Storage::exists('public/' . $data->image)) {
            Storage::delete('public/' . $data->image);
        }

        if($data->delete()) {
            session()->flash('success', "Successfully Delete !");
        }

        return back();
    }
}
