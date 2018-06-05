<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;

class StateController extends Controller
{

    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $states = State::all();
        return view('States/index', ['states' => $states]);
    }

    public function create() 
    {
        return view('States/new');
    }

    public function store(Request $request) 
    {
        $p = new State;
        $p->nameState = $request->input('nameState');
        $p->sigla = $request->input('sigla');
       
        if ($p->save()) {
            \Session::flash('status', 'Estado cadastrado com sucesso.');
            return redirect('/states');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao cadastrar o estado.');
            return view('states.new');
        }
    }

    public function edit($id) {
        $states = State::findOrFail($id);

        return view('states.edit', ['states' => $states]);
    }

    public function update(Request $request, $id) {
        $p = State::findOrFail($id);
        $p->nameState = $request->input('nameState');
        $p->sigla = $request->input('sigla');

        
        if ($p->save()) {
            \Session::flash('status', 'Estado atualizado com sucesso.');
            return redirect('/states');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o estado.');
            return view('states.edit', ['state' => $p]);
        }
    }

    public function destroy($id) {
        $p = State::findOrFail($id);
        $p->delete();

        \Session::flash('status', 'Estado removido com sucesso.');
        return redirect('/states');
    }
}
