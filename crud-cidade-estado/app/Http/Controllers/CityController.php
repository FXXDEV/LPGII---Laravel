<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\City;
use App\State;

class CityController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cities = City::all();
        $cities = DB::table('cities')
        ->join('states', 'cities.state_id', '=', 'states.id')
        ->select('cities.id','cities.name' ,'states.nameState', 'cities.hab')
        ->get();
        return view('cities/index', ['cities' => $cities]);
    }

    public function create() 
    {
        $states = State::all();        
        return view('cities/new', ['states' => $states]);
    
    }

    public function store(Request $request) 
    {
        $p = new City;
        $p->name = $request->input('nameCity');
        $p->state_id = $request->input('state_id');
        $p->hab = $request->get('hab');
        
        if ($p->save()) {
            \Session::flash('status', 'Cidade cadastrada com sucesso.');
            return redirect('/cities');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao cadastrar a cidade.');
            return view('cities.new');
        }
    }

    public function edit($id) {
        $city = City::findOrFail($id);
        $states = State::all(); 

        return view('cities.edit', ['city' => $city],['states'=>$states]);
    }

    public function update(Request $request, $id) {
        $p = City::findOrFail($id);
        $p->name = $request->input('nameCity');
        $p->state_id = $request->input('state_id');
        $p->hab = $request->input('hab');
        
        if ($p->save()) {
            \Session::flash('status', 'Cidade atualizada com sucesso.');
            return redirect('/cities');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar a cidade.');
            return view('cities.edit', ['city' => $p]);
        }
    }

    public function destroy($id) {
        $p = City::findOrFail($id);
        $p->delete();

        \Session::flash('status', 'Cidade removida com sucesso.');
        return redirect('/cities');
    }
}
