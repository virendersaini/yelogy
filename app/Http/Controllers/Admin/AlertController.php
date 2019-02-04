<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Alert;
use App\EmailTemplate;
use Illuminate\Http\Request;
use App\DataTables\AlertDataTable;
use App\Http\Controllers\Controller;

class AlertController extends Controller
{   
    /**
     * [$path : View Path]
     * @var string
     */
    protected $path = 'admin.alerts';
    /**
     * [$templateTypes : Email Template types]
     * @var array
     */
    protected $templateTypes = [
        'email' => EmailTemplate::class
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AlertDataTable $dataTable)
    {
        event (new \App\Events\TestEventFired(['test' => 'testing']));
        event (new \App\Events\TestEventAgain(['test' => 'testing']));
        return $dataTable->render("{$this->path}.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usersList = User::select('*')->get()->pluck('name','id');
        return view("$this->path.create",compact('usersList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:alerts',
            'template_type' => 'required',
            'template' => 'required',
            'fire' => 'required',
            'event' => 'required',
        ]);

        $request->merge([
            'template_type' => $this->templateTypes[$request->template_type],
            'template_id' => $request->template,
        ]);

        $alert = Alert::create($request->all());
        return $alert;
        dd($alert);

        if(!is_null($alert)){
            return back()->with('success', 'Email Template Createed Successfully.');
        }

        return back()->with('error', 'Error occure while processing your request.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function show(Alert $alert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function edit(Alert $alert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alert $alert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alert $alert)
    {
        //
    }

    public function fetchTemplates($templateType)
    {
        $templates = collect();
        if($templateType === 'email'){
            $templates = EmailTemplate::get();
        }

        $html = "<option value=''>Select a template</option>";
        if($templates->isNotEmpty()){
            foreach ($templates as $template) {
                $html .= "<option value='{$template->id}'>{$template->title}</option>";
            }
        }
        return response($html,200)->header('Content-Type','text/html');
    }
}
