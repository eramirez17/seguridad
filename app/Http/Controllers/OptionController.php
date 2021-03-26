<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Requests\OptionStoreRequest;
use App\Http\Requests\OptionUpdateRequest;


use App\Models\Profile;
class OptionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parentlist = Option::orderBy('caption','ASC')->pluck('caption','id');


        //obtener los datos del filtro de busqueda
        $id = $request->get('id');
        $caption = $request->get('caption');
        $abstract = $request->get('abstract');
        $parent_id = $request->get('parent_id');
        $paginate = ($request->get('paginate')) ? $request->get('paginate') : 10 ;


        $options = Option::id($id)
                    ->caption($caption)
                    ->abstract($abstract)
                    ->parent_id($parent_id)
                    ->orderBy('id','desc')
                    ->paginate($paginate);
        return view('seg.options.index',compact('options','parentlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentlist = Option::orderBy('caption','ASC')->pluck('caption','id');
        $profiles = Profile::orderBy('caption','ASC')->get();
        return view('seg.options.create',compact('profiles','parentlist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionStoreRequest $request)
    {
        $option = Option::create($request->all());
        $option->profiles()->sync($request->profiles);
        return "listo";
        return redirect()->route('options.show',compact('option'))
            ->with('info','Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //$option = Option::where('id',$id)->first();
        return view('seg.options.show',compact('option'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        $parentlist = Option::orderBy('caption','ASC')->pluck('caption','id');
        $profiles = Profile::orderBy('caption','ASC')->get();
        $selected = $option->profiles;
        //dd($selected);
        /*$checkboxes = collect();
        $i=0;*/

        return view('seg.options.edit',compact('option','parentlist','profiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(OptionUpdateRequest $request, Option $option)
    {
        $option = Option::find($option->id);
        $option->fill($request->all())->save();
        $option->profiles()->sync($request->profiles);
        return redirect()->route('options.show',compact('option')) 
            ->with('info','Registro actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        $option = Option::find($option->id)->delete();
        return back()->with('info','Registro eliminado con éxito');
    }
}
