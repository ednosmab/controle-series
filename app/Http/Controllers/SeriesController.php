<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::all();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index', compact('series', 'mensagemSucesso'));
    }

    public function show(Series $series)
    {
        return view('series.show')
            ->with('series', $series)
            ->with('qtySeasons', $series->seasons()->count())
            ->with('qtyEpisodeos', $series->episodes()->count());
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Series::create($request->all());
        $seasons = [];
        
        for ($i = 1; $i <= $request->seasonsQty; $i++) { 
            $seasons[] = [
                "series_id" => $serie->id,
                "number" => $i
            ];
        }

        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodesPerSeason; $j++) { 
                $episodes[] = [
                    "season_id" => $season->id,
                    "series_id" => $serie->id,
                    "number" => $i
                ];
            }
        }
        Episode::insert($episodes);

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->where('id', '=', $series->id)->update(['nome' => $request->nome]);
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' alterado para '{$request->nome}' com sucesso");
    }

    public function destroy(Series $series)
    {
        $series->delete();
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }
}
