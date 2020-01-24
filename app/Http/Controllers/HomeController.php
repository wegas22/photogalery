<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $item = Image::all();
        return view('home', compact('item'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();

        $item = (new Image())->create($data);

        if ($item){
            return redirect()->route('home.edit', [$item->id])->with(['success'=> 'Успешно сохранено']);
        }
        else{
            return back()->withErrors(['msg'=> 'Ошибка сохранения'])->withInput();
        }
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
        $item = Image::find($id);
        return view('edit', compact('item'));
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
        $item = Image::find($id);
        $result = $item->update($request->all());
        if($result) {
            return redirect()->route('home.edit', $item->id)->with(['success'=> 'Успешно сохранено']);
        }
        else{
            return back()->withErrors(['msg'=> 'Ошибка сохранения'])->withInput();
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
        $item = Image::find($id);
        $result = $item->delete();
        if($result) {
            return redirect()->route('home.index')->with(['success'=> 'Успешно удалено']);
        }
        else{
            return back()->withErrors(['msg'=> 'Ошибка сохранения'])->withInput();
        }
    }
}
