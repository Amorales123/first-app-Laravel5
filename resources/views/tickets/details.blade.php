@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="title-show">
                {{ $ticket->tittle }}
                @include('tickets/partials/status', compact('ticket'))                
            </h2>
            <p class="date-t">
                <span class="glyphicon glyphicon-time">
                {{-- Imprime en formato de:
                     día/mes/año horas(24 hrs):minutos(Am o Pm)
                --}}
                </span>{{ $ticket->created_at->format('d/m/y h:ia') }}
             </p>
            <h4 class="label label-info news">
                {{ count($ticket->votes) }} votos            
            </h4>
            
            <p class="vote-users">
                @foreach($ticket->votes as $user)
                <span class="label label-info">{{ $user->name }}</span>
                @endforeach
            </p>
            
            {!! Form::open([
                'route' =>  ['votes.submit',
                    $ticket->id],
                'method'=>  'POST'
                ]) !!}
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-thumbs-up"></span> Votar
                </button>
            {!! Form::close() !!}
            
            {!! Form::open([
                'route' =>  ['votes.destroy',
                    $ticket->id],
                'method'=>  'DELETE'
                ]) !!}
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-thumbs-up"></span> Eliminar
                </button>
            {!! Form::close() !!}

            <h3>Nuevo Comentario</h3>

            {!! Form::open([
                'route' =>  ['comments.comment',
                    $ticket->id],
                'method'=>  'POST'
                ]) !!}
                
                <div class="form-group">
                    <label for="comment">Comentarios:</label>
                    <textarea rows="4" class="form-control" name="comment" cols="50" id="comment"></textarea>
                </div>
                <div class="form-group">
                    <label for="link">Enlace:</label>
                    <input class="form-control" name="link" type="text" id="link">
                </div>
                <button type="submit" class="btn btn-primary">Enviar comentario</button>
                
            {!! Form::close() !!}
            

            <h3>{{ count($ticket->comments) }} comentarios </h3>
            @foreach($ticket->comments as $comment)
            <div class="well well-sm">
                <p><strong>{{$comment->user->name }}</strong></p>
                <p>{{ $comment->comment }}</p>
                <p class="date-t">
                    <span class="glyphicon glyphicon-time"></span> 
                    {{ $comment->created_at->format('d/m/Y h:ia') }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
