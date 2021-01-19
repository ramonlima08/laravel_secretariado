<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Company;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', ['contacts'=> $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = "Novo";
        $contact = new Contact();
        $data = Company::all(['id', 'name']);
        $companies = [];
        $companySel = 0;
        foreach($data as $k => $item){
            $companies[$k]['value'] = $item->id;
            $companies[$k]['text'] = $item->name;
        }

        return view('admin.contact.createoredit',
            ['contact'=>$contact,'action'=>$action, 'companies'=>$companies, 'copmanySel'=>$companySel]
        );
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

        $data = $request->only('name','company_id','cellphone','telephone','email','note');
        if($data['company_id']==0){
            $data['company_id'] = null;
        }
        Contact::create($data);

        return redirect()->route('contato.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        $action = "Ver";
        $disabled = "disabled='disabled'";
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$contact){
            return redirect()->back();
        }

        $data = Company::all(['id', 'name']);
        $companies = [];
        foreach($data as $k => $item){
            $companies[$k]['value'] = $item->id;
            $companies[$k]['text'] = $item->name;
        }

        return view('admin.contact.createoredit',
            ['contact'=>$contact,'action'=>$action,'disabled'=>$disabled, 'companies'=>$companies]
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
        $contact = Contact::find($id);
        $action = "Alterar";
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$contact){
            return redirect()->back();
        }

        $data = Company::all(['id', 'name']);
        $companies = [];
        foreach($data as $k => $item){
            $companies[$k]['value'] = $item->id;
            $companies[$k]['text'] = $item->name;
        }
        $copmanySel = $contact->company_id;

        return view('admin.contact.createoredit',
            ['contact'=>$contact,'action'=>$action,'companies'=>$companies,'copmanySel'=>$copmanySel]
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
        
        $contact = Contact::find($id);
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$contact){
            return redirect()->back();
        }

        $data = $request->all();

        if($data['company_id']==0){
            $data['company_id'] = null;
        }

        $contact->update($data);
        return redirect()->route('contato.index');
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
