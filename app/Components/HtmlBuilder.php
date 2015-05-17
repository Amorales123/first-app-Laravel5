<?php namespace TeachMe\Components;
/*
 * Extiendo la Clase de Laravel Collective para generar mis 
 * Propios Componentes como uno para generar Menú por ejemplo
 */

// Utilizando iyección de dependencias
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\View\Factory as View;
//-- Fin de la inyección de Dependencias

use Collective\Html\HtmlBuilder as CollectiveHtmlBuilder;
use Illuminate\Routing\UrlGenerator;

class HtmlBuilder extends CollectiveHtmlBuilder{
    
    private $config;
    private $view;    
    
    public function __construct(Config $config, View $view, UrlGenerator $url = null)
    {
        $this->config = $config;
        $this->view =   $view;
        $this->url  =   $url;       
    }
    
    public function menu($items)
    {
        
        if(! is_array($items)){
            /*  
             * Si No es array entonces paso una llave de la
             * configuración de Laravel
             */
            $items = $this->config->get($items, array());
        }
        return $this->view->make('partials/menu', compact('items'));
    }
    
    /**
     * Builds an HTML class attribute dynamically
     * Usage:
     * {!! Html::classes(['home' => true, 'main', 'dont-use-this' => false]) !!}
     * Returns:
     *  class="home main".
     *
     * @param array $classes
     *
     * @return string
     */
    public function classes(array $classes)
    {
        $html = '';
        foreach ($classes as $name => $bool) {
            if (is_int($name)) {
                $name = $bool;
                $bool = true;
            }
            if ($bool) {
                $html .= $name.' ';
            }
        }
        if (! empty($html)) {
            return ' class="'.trim($html).'"';
        }
        return '';
    }
    
}
