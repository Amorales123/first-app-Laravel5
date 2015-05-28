<?php namespace TeachMe\Entities;

use TeachMe\Entities\Entity;

class Ticket extends Entity {

    protected $fillable = ['title','status'];
    /*
     * Convenciones de Laravel (Evita el Uso de JOIN en un query MySQL)
     */
    public function author()
    {
        /*
         * Le indico que la relación será User_id
         */
        return $this->belongsTo(User::getClass(),'user_id');
    }
    
    public function comments() 
    {
        return $this->hasMany(TicketComments::getClass());
    }

    public function votes() 
    {
        //Estableciendo una asociación muchos a muchos
        return $this->belongsToMany(User::getClass(),'ticket_votes');
    }
    
    public function getOpenAttribute()
    {
        return $this->status == 'open';
    }

}
