<?php

return array(
    'latest_title'  =>  'Solicitudes recientes',
    'open_title'    =>  'Solicitudes abiertas',
    'closed_title'  =>  'Tutoriales',
    'popular_title' =>  'Solicitudes populares',
    
    /*
     * :count = Parámetro dinámico enviado por la función
     * Lang::choice();
     */
    
    'latest_total'  =>  '{0} No hay Solicitudes recientes'
                        .'|{1} Sólo hay una solicitud reciente'
                        .'|[2,Inf] Hay :count solicitudes recientes',
    
    'open_total'  =>    '{0} No hay Solicitudes abiertas'
                        .'|{1} Sólo hay una solicitud abierta'
                        .'|[2,Inf] Hay :count solicitudes abiertas',
    
    'closed_total'  =>  '{0} No hay Solicitudes tutoriales'
                        .'|{1} Sólo hay una solicitud tutorial'
                        .'|[2,Inf] Hay :count solicitudes tutoriales',
    
    'popular_total'  =>  '{0} No hay Solicitudes populares'
                        .'|{1} Sólo hay una solicitud popular'
                        .'|[2,Inf] Hay :count solicitudes populares',
    
    'status'    =>  array(
        'open'  =>  'Abierta',
        'closed'=>  'Finalizada'
    )
);
