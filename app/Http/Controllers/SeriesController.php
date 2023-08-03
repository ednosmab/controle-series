<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::query()->orderBy('nome')->get();
        return view('series.index', compact('series'));
    }

    public function view(Request $request)
    {
        $idSerie = $request->id;
        // $serie = Serie::select('*')->where('id', '=', $idSerie)->get();
        $serieAll = Serie::find($idSerie);
        return view('series.view', compact('serieAll'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nomeSerie = $request->input('nome');
        $serie = new Serie();
        $serie->nome = $nomeSerie;
        $serie->save();
        return redirect('/series');
    }

    public function edit(Request $request)
    {
        $idSerie = $request->id;
        $serieAll = Serie::select('nome')->where('id', '=', $idSerie)->get();
        foreach ($serieAll as $serie) {
            $nomeSerie = $serie->nome;
        }
        return view('series.edit', compact('nomeSerie', 'idSerie'));
    }

    public function update(Request $request)
    {
        $idSerie = $request->id;
        $alterNameSerie = $request->input('nome');

        $success = Serie::where('id', '=', $idSerie)->update(['nome' => $alterNameSerie]);

        if(!$success){
            return redirect('/series')->with('error', [
                'msg' => "Nome da série ".$alterNameSerie." não foi alterado com sucesso",
            ]);
        }

        return redirect('/series');
    }

    public function delete(Request $request)
    {
        $idSerie = $request->id;
        Serie::where('id', '=', $idSerie)->delete();
        return redirect('/series');
    }
}
