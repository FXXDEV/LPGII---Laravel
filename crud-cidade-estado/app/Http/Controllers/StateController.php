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
        $States = State::all();
        return view('States/index', ['states' => $States]);
    }

    public function create() 
    {
        return view('States/new');
    }

    public function store(Request $request) 
    {
        $p = new State;
        $p->name = $request->input('nameState');
        //$p->name = $request->input('name');


        
        if ($p->save()) {
            \Session::flash('status', 'Estado cadastrado com sucesso.');
            return redirect('/states');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao cadastrar o estado.');
            return view('states.new');
        }
    }

    public function edit($id) {
        $States = State::findOrFail($id);

        return view('states.edit', ['states' => $States]);
    }

    public function update(Request $request, $id) {
        $p = State::findOrFail($id);
        $p->name = $request->input('name');

        
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
