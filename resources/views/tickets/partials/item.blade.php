<div data-id="25" class="well well-sm request">
    <h4 class="list-title">
        {{ $ticket->title }}
        @include('tickets/partials/status', compact('ticket'))
    </h4>
    <p>{{-- OCULTANDO BOTONES
        <a href="#" class="btn btn-primary btn-vote" title="Votar por este tutorial">
            <span class="glyphicon glyphicon-thumbs-up"></span> Votar
        </a>

        <a href="#" class="btn btn-hight btn-unvote hide">
            <span class="glyphicon glyphicon-thumbs-down"></span> No votar
        </a>
        --}}
        <a href="{{ route('Tickets.details', $ticket) }}">
            <span class="votes-count">
                {{ $ticket->votes()->count() }} votos
            </span>
            - <span class="comments-count">
                {{$ticket->comments()->count() }} comentarios
            </span>.
        </a>

        <p class="date-t">
            <span class="glyphicon glyphicon-time">
            {{-- Imprime en formato de:
                 día/mes/año horas(24 hrs):minutos(Am o Pm)
            --}}
            </span>{{ $ticket->created_at->format('d/m/y h:ia') }}
        </p>
    </p>
</div>