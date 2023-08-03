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
            <a href="/series" class="btn btn-dark mb-2">Listar Series</a>
            <a href="{{url('series/editar/' . $serieAll->id)}}" class="btn btn-warning mb-2">Editar</a>
            <a href="{{url('series/deletar/' . $serieAll->id)}}" class="btn btn-danger mb-2">Deletar</a>
        </div>
    </div>
    </div>
</x-layout>