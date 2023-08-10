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
        <div class="alert alert-success">
            {{$mensagemSucesso}}
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
                <div class="accordion-body d-flex justify-content-end">
                    <div class="d-flex justify-content-between align-items-center">
                        <form action="{{route('series.show', $serie->id)}}" method="get">
                            @csrf
                            <button class="btn btn-primary btn-sm">Visualizar</button>
                        </form>
                        <form action="{{route('series.edit', $serie->id)}}" method="get">
                            @csrf
                            <button class="btn btn-warning btn-sm">Editar</button>
                        </form>
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
