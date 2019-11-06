<?php

namespace App\Http\Controllers;

use Auth;
use App\Line;
use Illuminate\Http\Request;

class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lines = Line::where('status', '=', 1)->paginate(10);

        return view('lines.index')->with('lines', $lines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required'
            ]
        );

        $name = $request['name'];
        $line = new Line();
        $line->name = $name;
        
        $user = Auth::User();
        $line->user_create = $user->id;
        
        $line->save();

        return redirect()->route('lines.index')
            ->with('flash_message',
             'Linea '. $line->name.' agregada!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('lines');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $line = Line::where('status', '=', 1)->findOrFail($id);
        

        return view('lines.edit', compact('line'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required'
        ]);
        
        $line = Line::where('status', '=', 1)->findOrFail($id);
        
        $input = $request->all();
        $user = Auth::User();
        $input["user_modified"] = $user->id;
        
        $line->fill($input)->save();
        
        return redirect()->route('lines.index')
            ->with('flash_message',
             'Linea '. $line->name.' modificada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Line  $line
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $line = Line::where('status', '=', 1)->findOrFail($id); 
        $user = Auth::User();
        $lineUpdate["user_modified"] = $user->id;
        $lineUpdate["status"] = 0;
        
        $line->fill($lineUpdate)->save();

        return redirect()->route('lines.index')
            ->with('flash_message',
             'Linea eliminada!');
    }
}
