<x-layout title="Editar Série">
    <form action="{{route('series.update', $idSerie)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Editar</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{$nomeSerie}}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>

    </form>
</x-layout>