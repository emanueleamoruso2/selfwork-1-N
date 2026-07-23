<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=Article::all(); // mi recupera dal DB tutti gli articoli e li salva in una collezione
        return view('article.index',compact('articles')); // nella compact passare come argomento la stringa del nome della variabile
       // ['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->hasFile('img'));

        $title= $request->title;
        $subtitle= $request->subtitle;
        $body= $request->body;
        // METODO 1 PER IL CONTROLLO DELLE IMMAGINI
        // if($request->file('img')){  // l'utente mi ha passato l'immagine?
        // // se si, allora fai l'operazione di salvataggio con l'immagine,
        // //altrimenti non mettere l'immagine
        //     Article::create(
        //         [
        //         'title' => $title,
        //         'subtitle' => $subtitle,
        //         'body' => $body,
        //         'img' => $request->file('img')->store('img', 'public')
        //         ]
        //     );
        // }
        // else{
        //      Article::create(
        //         [
        //         'title' => $title,
        //         'subtitle' => $subtitle,
        //         'body' => $body,
        //         ]
        //     );
        // }
        // $img = $request->file('img')->store('img', 'public');
        //METODO 2
        $article = Article::create([
            'title' => $title,
            'subtitle' => $subtitle,
            'body' => $body,
            'user_id' => Auth::user()->id,
            ]);
            // 'img' => $request->file('img')->store('img', 'public')]);
            // creo l'articolo e lo salvo l'oggetto in una variabile $article

            if($request->file('img')){
                $article->img = 
                $request->file('img')->store('img','public'); // valorizzo l'oggetto con il nuovo valore di img
                $article->save(); // salvo nel database il nuovo valore dell'oggetto
            }


        
        // MASS ASSIGNMENT
        // Creiamo un nuovo articolo con i dati della request

        return redirect()->back()->with('message','articolo inserito con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        // dd($request->all(),$article);

        if($request->file('img')){
            $img = $request->file('img')->store('img','public');
        }
        else{
            $img= $article->img;
        }

        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'img' => $img
        ]);


        return redirect(route('article.index'))->with('message','articolo modificato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
            // metodo per eliminare un articolo
        $article->delete();
    // soft delete: l'operazione di eliminazione è irreversibile, quindi a volte si compie la soft delete cioè l'utente non vede l'articolo eliminato, ma rimane nel database quel record aggiornato con una data delete_at, in modo tale che l'utente può ripristinare il record entro 30 giorni ad esempio. Oppure posso far comparire delle modali di conferma 
        return redirect()->back()->with('message','articolo eliminato');
    }
}
