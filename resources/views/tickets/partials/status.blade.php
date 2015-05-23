<span {!! Html::classes(['label label-info absolute', 'highlight' => $ticket->open]) !!}>
    {{--
        trans() = función de traducción de Laravel hubicada en 
        resources/lang/[Idioma_escojido en config/app(arr 'locale')].
        (Nombre Archivo).array
        
    --}}
    {{ trans('tickets.status.'. $ticket->status)  }}
</span>