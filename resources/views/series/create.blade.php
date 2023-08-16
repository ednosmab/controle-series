<x-layout title="Nova Série">
    <form action="{{route('series.store')}}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome</label>
                <input
                    type="text" 
                    class="form-control" 
                    id="nome" 
                    name="nome"
                    value="{{old('nome')}}"
                    autofocus
                />
            </div>
            <div class="col-2">
                <label for="seasonsQty" class="form-label">Nº Temporadas:</label>
                <input
                    type="text" 
                    class="form-control" 
                    id="seasonsQty" 
                    name="seasonsQty"
                    value="{{old('seasonsQty')}}"
                />
            </div>
            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Eps / Temporadas:</label>
                <input
                    type="text" 
                    class="form-control" 
                    id="episodesPerSeason" 
                    name="episodesPerSeason"
                    value="{{old('episodesPerSeason')}}"
                />
            </div>
        </div>
    
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</x-layout>
