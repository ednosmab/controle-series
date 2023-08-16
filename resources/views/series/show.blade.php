<x-layout title="Controle Series Visualizar">
    <table class="table border table-hover mt-5">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome da Série</th>
            <th scope="col">Quantidade de Temporadas</th>
            <th scope="col">Quantidade de Episódeos</th>
            <th scope="col">Data de Inserção</th>
            <th scope="col">Data de Modificação</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">{{$series->id}}</th>
        <td>{{$series->nome}}</td>
        <td>{{$qtySeasons}}</td>
        <td>{{$qtyEpisodeos}}</td>
        <td>{{\Carbon\Carbon::parse($series->created_at)->format('d/m/Y h:i')}}</td>
        <td>{{\Carbon\Carbon::parse($series->updated_at)->format('d/m/Y h:i')}}</td>
    </tbody>
    </table>

    <div class="accordion-body d-flex justify-content-end">
        <div class="d-flex justify-content-between col-5">
            <a href="{{route('series.index')}}" class="btn btn-dark btn-sm">Listar Series</a>

            <a href="{{route('seasons.index', $series->id)}}" class="btn btn-primary btn-sm">Visualizar Temporadas</a>
            <a href="{{route('series.edit', $series->id)}}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{route('series.destroy', $series->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Deletar</button>
            </form>
        </div>
    </div>
    </div>
</x-layout>