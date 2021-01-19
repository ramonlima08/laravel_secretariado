<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Responsible;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsibles = Responsible::all();
        return view('admin.responsible.index',['responsibles'=>$responsibles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = "Novo";
        return view('admin.responsible.createoredit',
        ['action'=>$action]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages  = [
            'name.required' => 'O nome é obrigatório'
        ];

        $request->validate([
            'name' => 'required',
        ], $messages);

        $data = $request->only('name','cellphone','telephone','email','note');
        Responsible::create($data);

        return redirect()->route('responsavel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $responsible = Responsible::find($id);
        $action = "Ver";
        $disabled = "disabled='disabled'";
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$responsible){
            return redirect()->back();
        }

        return view('admin.responsible.createoredit',
            ['responsible'=>$responsible,'action'=>$action,'disabled'=>$disabled]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $responsible = Responsible::find($id);
        $action = "Alterar";
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$responsible){
            return redirect()->back();
        }

        return view('admin.responsible.createoredit',
            ['responsible'=>$responsible,'action'=>$action]
        );
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
        $messages  = [
            'name.required' => 'O nome é obrigatório'
        ];

        $request->validate([
            'name' => 'required',
        ], $messages);
        
        $responsible = Responsible::find($id);
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$responsible){
            return redirect()->back();
        }

        $data = $request->all();

        $responsible->update($data);
        return redirect()->route('responsavel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
