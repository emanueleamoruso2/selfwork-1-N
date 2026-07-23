<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //  public function __construct() {
    //     $this->middleware('auth');
    // } deprecated

    public function store(Request $request){
    
    // i dati del form
    $name= $request->name;
    //  $name= $request->input('name');
    $description = $request->description;
    $price=$request->price;
    // $img = null;
    // if($request->file('img')){
    //     $img = $request->file('img')->store('public/img'); // catturo l'upload del file e gli dico salvalo all'interno del mio storage. Il metodo file mi cattura l'uploaded file della request, mentre il metodo store mi salva il file nel percorso 'storage/app/public/img' nel nostro caso specifico
    // }

    // $img = ($request->file('img')) ? $request->file('img')->store('public/img') : null;
    // @dd($request->all());
    // METODO SALVARE DATI DB 1
    // creo un nuovo oggetto di classe product
    // $product = new Product();

    // // Valorizzando i campi dell'oggetto $product
    // $product->name=$name;
    // $product->description=$description;
    // $product->price=$price;

    // // dd($product);
    // // sto salvando il prodotto nel mio db
    // $product->save();

    // METODO SALVARE DATI DB2
    // MASS ASSIGNMENT 

    $product= Product::create([
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'user_id' => Auth::user()->id
    ]);

    
            if($request->file('img')){
                $product->img = 
                $request->file('img')->store('img','public'); // valorizzo l'oggetto con il nuovo valore di img
                $product->save(); // salvo nel database il nuovo valore dell'oggetto
            }

    return redirect()->back()->with('message','Prodotto inserito');
    }

    Public function index(){
        // sto richiedendo al mio db tutti gli elementi all'interno della tabella products
        $products=Product::all();
        return view('index',['products'=>$products]);
    }

    public function create(){
        return view('product.create');
    }
}

// si usano i modelli che sono entità che fanno da tramite che comunicano tra database e laravel stesso utilizzando Eloquent. I modelli mi permettono di creare classi preimpostate di laravel che mi consentono di definire i prodotti costruendo degli oggetti che saranno incapsulati all'itnerno del mio databse