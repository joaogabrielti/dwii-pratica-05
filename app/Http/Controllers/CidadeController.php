<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CidadeController extends Controller {
    private $cidades = [['id' => 1, 'nome' => 'PARANAGUÁ', 'porte' => 'MÉDIO']];

    public function __construct() {
        $session = session('cidades');
        if (!isset($session)) {
            session(['cidades' => $this->cidades]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cidades = session('cidades');
        return view('cidade.index', compact('cidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('cidade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = array_map('mb_strtoupper', $request->validate([
            'nome' => ['required', 'string'],
            'porte' => ['required', 'string']
        ]));

        $cidades = session('cidades');
        $data['id'] = count($cidades) + 1;
        array_push($cidades, $data);

        session(['cidades' => $cidades]);

        return redirect(route('cidade.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $cidade
     * @return \Illuminate\Http\Response
     */
    public function show($cidade) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit($cidade) {
        $cidades = session('cidades');
        foreach ($cidades as $c) {
            if ($c['id'] == $cidade) {
                $cidade = $c;
                break;
            }
        }
        return view('cidade.create', compact('cidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cidade) {
        $data = array_map('mb_strtoupper', $request->validate([
            'nome' => ['required', 'string'],
            'porte' => ['required', 'string']
        ]));

        $cidades = session('cidades');
        for ($i = 0; $i < count($cidades); $i++) {
            if ($cidades[$i]['id'] == $cidade) {
                $cidades[$i]['nome'] = $data['nome'];
                $cidades[$i]['porte'] = $data['porte'];
                break;
            }
        }

        session(['cidades' => $cidades]);

        return redirect(route('cidade.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy($cidade) {
        $cidades = session('cidades');

        for ($i = 0; $i < count($cidades); $i++) {
            if ($cidades[$i]['id'] == $cidade) {
                unset($cidades[$i]);
                $cidades = array_values($cidades);
                break;
            }
        }

        session(['cidades' => $cidades]);

        return redirect(route('cidade.index'));
    }
}
