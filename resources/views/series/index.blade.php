<x-layout title="Controle Series Lista">
    @if (session('error'))
        @foreach (session('error') as $key => $msg)
                @if ($key == 'msg')
                    <h2>{{$msg}}</h2>
                @endif
        @endforeach
    @endif
    <a href="/series/criar" class="btn btn-dark mb-2">Adicionar</a>

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
                    <div class="d-flex justify-content-between col-3">
                        <a href="{{url('series/visualisar/' . $serie->id)}}" class="btn btn-primary mb-2">Visualizar</a>
                        <a href="{{url('series/editar/' . $serie->id)}}" class="btn btn-warning mb-2">Editar</a>
                        <a href="{{url('series/deletar/' . $serie->id)}}" class="btn btn-danger mb-2">Deletar</a>
                    </div>
                </div>
            </div>
            </div>
            @php($count++)
        @endforeach
    </div>
</x-layout>
