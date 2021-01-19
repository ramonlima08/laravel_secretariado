<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    protected $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campanies = Company::all();
        return view('admin.company.index', ['campanies'=> $campanies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = "Nova";
        return view('admin.company.createoredit',
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

        $data = $request->only('name','cnpj','telephone','email','site','note');
        Company::create($data);

        return redirect()->route('empresa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        $action = "Ver";
        $disabled = "disabled='disabled'";
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$company){
            return redirect()->back();
        }

        return view('admin.company.createoredit',
            ['company'=>$company,'action'=>$action,'disabled'=>$disabled]
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
        $company = Company::find($id);
        $action = "Alterar";
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$company){
            return redirect()->back();
        }

        return view('admin.company.createoredit',
            ['company'=>$company,'action'=>$action]
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
        
        $company = Company::find($id);
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$company){
            return redirect()->back();
        }

        $data = $request->all();

        $company->update($data);
        return redirect()->route('empresa.index');
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
