<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::all();
        return view('admin.financial.bank.index', ['banks'=> $banks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = "Novo";
        return view('admin.financial.bank.createoredit',
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
            'name.required' => 'O nome é obrigatório',
            'agency.required' => 'A agencia é obrigatória',
            'account.required' => 'A conta é obrigatória',
            'account_dv.required' => 'O digito da conta é obrigatória',
        ];

        $request->validate([
            'name' => 'required',
            'agency' => 'required',
            'account' => 'required',
            'account_dv' => 'required',
        ], $messages);

        $data = $request->only('name','cod','agency','agency_dv','account','account_dv','manager','phone','note');
        Bank::create($data);

        return redirect()->route('banco.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank = Bank::find($id);
        $action = "Ver";
        $disabled = "disabled='disabled'";
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$bank){
            return redirect()->back();
        }

        return view('admin.financial.bank.createoredit',
            ['bank'=>$bank,'action'=>$action,'disabled'=>$disabled]
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
        $bank = Bank::find($id);
        $action = "Alterar";
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$bank){
            return redirect()->back();
        }

        return view('admin.financial.bank.createoredit',
            ['bank'=>$bank,'action'=>$action]
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
        return redirect()->route('banco.index');
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
