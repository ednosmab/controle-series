<x-layout title="Controle Series Lista">
    @if (session('error'))
        @foreach (session('error') as $key => $msg)
                @if ($key == 'msg')
                    <h2>{{$msg}}</h2>
                @endif
        @endforeach
    @endif
    <a href="{{route('series.create')}}" class="btn btn-dark mb-2">Adicionar</a>

    @isset($mensagemSucesso)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{$mensagemSucesso}}
            <button type="button" class="btn btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close" style="width: 16"></button>
        </div>
    @endisset
    @php($count = 1)
    <div class="accordion" id="accordionExample">
        @foreach ($series as $serie)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$count}}" aria-expanded="false" aria-controls="collapse{{$count}}">
                    {{ $serie->nome }}
                    </button>
                </h2>
                <div id="collapse{{$count}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body d-flex justify-content-end md-2">
                        <div class="d-flex justify-content-between col-3">
                            <a href="{{route('series.show', $serie->id)}}" class="btn btn-primary btn-sm">Visualizar</a>
                            <a href="{{route('series.edit', $serie->id)}}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{route('series.destroy', $serie->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @php($count++)
        @endforeach
    </div>
</x-layout>
