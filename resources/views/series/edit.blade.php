<x-layout title="Editar Série">
    <form action="{{route('series.update', $series->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Editar</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{$series->nome}}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>

    </form>
</x-layout>