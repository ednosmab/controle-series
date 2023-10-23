<?php

namespace App\Repositories;

use App\Models\Season;
use App\Models\Series;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SeriesFormRequest;

class EloquentSeriesRepository implements SeriesRepository
{
    public function add(SeriesFormRequest $request): Series
    {
        return DB::transaction(function () use ($request){

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
                for ($i = 1; $i <= $request->episodesPerSeason; $i++) { 
                    $episodes[] = [
                        "season_id" => $season->id,
                        "series_id" => $serie->id,
                        "number" => $i
                    ];
                }
            }
            Episode::insert($episodes);
            
            return $serie;
        });
    }
}
