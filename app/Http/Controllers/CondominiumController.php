<?php

namespace App\Http\Controllers;

use App\Http\Requests\CondominiumRequest;
use App\Http\Requests\CondominiumUpdateRequest;
use App\Models\Condominium;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CondominiumController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select * from users
        $users = User::all();

        // select * from condominiums;
        $condominiumList = Condominium::all();
        return view('condominium.lista', array(
            'xptoCollection' => $condominiumList, 'users' => $users
        ));
    }

    public function search(Request $request) 
    {
        // select * from users 
        $users = User::all();

        // select * from condominiums where user_sindico_id = ?
        $condominium = Condominium::where('user_sindico_id', '=', $request->get('sindico'));
        if ($request->filled('id')) {
            $condominium->where('id', '=', $request->get('id'));
        }

        $lista = $condominium->get();
        return view('condominium.lista', array(
            'xptoCollection' => $lista, 'users' => $users
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('condominium.form', ['users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CondominiumRequest $request)
    {
        $sindico = User::find($request->get('sindico'));
        $subSindico = User::find($request->get('subsindico'));

        $condominio = new Condominium($request->all());
        $condominio->sindico()->associate($sindico);
        $condominio->subSindico()->associate($subSindico);
        $condominio->save();

        return redirect()->route('condominium.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Condominium $condominio
     * @return \Illuminate\Http\Response
     */
    public function show(Condominium $condominium)
    {    
        $users = User::all();
        return view('condominium.form', [
            'users' => $users,
            'condominio' => $condominium,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Condominium $condominio
     * @return \Illuminate\Http\Response
     */
    public function edit(Condominium $condominium)
    {
        $users = User::all();
        return view('condominium.form', [
            'users' => $users,
            'condominio' => $condominium 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CondominiumUpdateRequest $request
     * @param  Condominium $condominium
     * @return \Illuminate\Http\Response
     */
    public function update(CondominiumUpdateRequest $request, Condominium $condominium)
    {
        $condominium->fillable($request->all());
        $condominium->sindico()->associate(User::find($request->get('sindico')));
        $condominium->subSindico()->associate(User::find($request->get('subsindico')));
        $condominium->save();
        return redirect()->route('condominium.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Condominium $condominium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condominium $condominium)
    {
        $condominium->delete();
        return redirect()->route('condominium.index');
    }
}
