<x-layout title="Editar Série">
    {{-- {{dd($idSerie)}} --}}
    <form action="/series/editar/{{$idSerie}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Editar</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{$nomeSerie}}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>

    </form>
</x-layout>