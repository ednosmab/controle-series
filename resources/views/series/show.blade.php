<x-layout title="Controle Series Visualizar">
    <table class="table border table-hover mt-5">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome da Série</th>
            <th scope="col">Data de Inserção</th>
            <th scope="col">Data de Modificação</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">{{$serieAll->id}}</th>
        <td>{{$serieAll->nome}}</td>
        <td>{{\Carbon\Carbon::parse($serieAll->created_at)->format('d/m/Y h:i')}}</td>
        <td>{{\Carbon\Carbon::parse($serieAll->updated_at)->format('d/m/Y h:i')}}</td>
    </tbody>
    </table>

    <div class="accordion-body d-flex justify-content-end">
        <div class="d-flex justify-content-between col-3">
            <form action="{{route('series.index')}}" method="get">
                @csrf
                <button class="btn btn-dark btn-sm">Listar Series</button>
            </form>
            <form action="{{route('series.edit', $serieAll->id)}}" method="get">
                @csrf
                <button class="btn btn-warning btn-sm">Editar</button>
            </form>
            <form action="{{route('series.destroy', $serieAll->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Deletar</button>
            </form>
        </div>
    </div>
    </div>
</x-layout>