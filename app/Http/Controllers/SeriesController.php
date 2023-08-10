<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index', compact('series', 'mensagemSucesso'));
    }

    public function show(Serie $series)
    {
        return view('series.show', ['serieAll' => $series]);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
    }

    public function edit(Serie $series)
    {
        return view('series.edit', ['nomeSerie' => $series->nome, 'idSerie' => $series->id]);
    }

    public function update(Serie $series, Request $request)
    {
        $series->where('id', '=', $series->id)->update(['nome' => $request->nome]);
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' alterado para '{$request->nome}' com sucesso");
    }

    public function destroy(Serie $series)
    {
        $series->delete();
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }
}
