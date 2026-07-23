<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //lavarel utilizza un tipo di proprietà che si chiama fillable cioè tutto ciò che è rimpeibile e questa proprietà definisce i campi del mio modello
    protected $fillable=[
        'name',
        'description',
        'price',
        'img',
        'user_id'
    ];
    // get the user that owns the product. Relazione Many to One
    public function user(){
        return $this->belongsTo(User::class); // questo metodo ci indica che quando richiamo il metodo user, ci ritorna l'utente collegato al prodotto
    }
}
