<x-layout title="Temporadas da Série {!!$series->nome!!}">
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Temporada {{$season->number}}

                <span class="badge bg-secondary">
                    {{$season->episodes->count()}}
                </span>
            </li>
        @endforeach
    </ul>
    <a  href="{{ url()->previous() }}" class="btn btn-sm btn-primary mt-3">Voltar</a>
</x-layout>
