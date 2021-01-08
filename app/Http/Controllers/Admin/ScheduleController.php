<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Schedule;
use App\Models\EventType;
use App\Models\Contact;
use App\Models\Responsible;

class ScheduleController extends Controller
{
    protected $event_types;
    protected $contacts;
    protected $responsibles;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::orderByDesc("date")->get();
        return view('admin.schedule.index',['schedules'=>$schedules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = "Novo";
        $schedule = new Schedule();
        $this->loadDadosToForm();
        //dd($this->responsibles);
        return view('admin.schedule.createoredit', [
            'action' => $action,
            'schedule' => $schedule,
            'responsibles' => $this->responsibles,
            'contacts' => $this->contacts,
            'event_types' => $this->event_types,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name','date','contact_id','event_type_id','resopnsible_id','note');
        $obj = new Schedule();
        $data['date'] = $obj->getDateFormatBd($data['date']);
        Schedule::create($data);

        return redirect()->route('agenda.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::find($id);
        $action = "Ver";
        $disabled = "disabled='disabled'";
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$schedule){
            return redirect()->back();
        }

        $this->loadDadosToForm();

        return view('admin.schedule.createoredit',
            ['schedule'=>$schedule,
            'action'=>$action,
            'disabled'=>$disabled,
            'responsibles' => $this->responsibles,
            'contacts' => $this->contacts,
            'event_types' => $this->event_types,
            ]
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
        $schedule = Schedule::find($id);
        $action = "Alterar";
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$schedule){
            return redirect()->back();
        }

        $this->loadDadosToForm();

        return view('admin.schedule.createoredit',
            ['schedule'=>$schedule,
            'action'=>$action,
            'responsibles' => $this->responsibles,
            'contacts' => $this->contacts,
            'event_types' => $this->event_types,
            ]
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
        $schedule = Schedule::find($id);
        //Caso não encontre no BD ele retorna pra tela anterior
        if(!$schedule){
            return redirect()->back();
        }

        $data = $request->all();
        $data['date'] = $schedule->getDateFormatBd($data['date']);

        $schedule->update($data);
        return redirect()->route('agenda.index');
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

    protected function loadDadosToForm(){
        $responsibles = Responsible::all();
        $this->responsibles = [];
        foreach($responsibles as $k => $responsible){
            $this->responsibles[$k]['value'] = $responsible->id;
            $this->responsibles[$k]['text'] = $responsible->name;
        }

        $contacts = Contact::all();
        $this->contacts = [];
        foreach($contacts as $k => $contact){
            $this->contacts[$k]['value'] = $contact->id;
            $this->contacts[$k]['text'] = $contact->name;
        }

        $event_types = EventType::all();
        $this->event_types = [];
        foreach($event_types as $k => $event_type){
            $this->event_types[$k]['value'] = $event_type->id;
            $this->event_types[$k]['text'] = $event_type->name;
        }
        
    }
}
