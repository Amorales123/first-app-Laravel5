<?php namespace TeachMe\Components;
/*
 * Extiendo la Clase de Laravel Collective para generar mis 
 * Propios Componentes como uno para generar Menú por ejemplo
 */
use Collective\Html\HtmlBuilder as CollectiveHtmlBuilder;

class HtmlBuilder extends CollectiveHtmlBuilder{
    
    public function menu()
    {
        return view('partials/menu');
    }
}
