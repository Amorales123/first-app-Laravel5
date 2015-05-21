<?php namespace TeachMe\Http\Controllers;

use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;

use Illuminate\Http\Request;
use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketComments;
class TicketsController extends Controller {

    public function latest()
    {
       $tickets = Ticket::orderBy('created_at', 'DESC')->paginate();
        
        return view('tickets/list',compact('tickets'));
    }
    
    public function popular()
    {
        return view('tickets/list');
    }
    
    public function open()
    {
        $tickets = Ticket::where('status','open')->paginate();
        return view('tickets/list',compact('tickets'));
    }
    
    public function closed()
    {
        $tickets = Ticket::where('status','closed')->paginate();
        return view('tickets/list',compact('tickets'));
    }
    
    public function details($id)
    {
        /*
         * El método findOrFail
         * se encarga de obtener el ticket solicitado
         * en caso de no existir retorna un error 404
         */
        $ticket = Ticket::findOrFail($id);
        /*
         * La Variable $comments es anulada debido a las convenciones
         * realizadas en los modelos
         * para mayor información consultar la documentación
         * o bien, ver el video 2.8 del Tutorial
         * Crea tu primera aplicación con Laravel 5
         */
        /*
        $comments = TicketComments::select('ticket_comments.*','users.name')
            ->join('users','ticket_comments.user_id','=','users.id')
            ->where('ticket_id',$id)
            ->get();
        */
        return view('tickets/details', compact('ticket'));
    }

}
