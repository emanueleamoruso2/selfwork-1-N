<x-layout>
<header class="header">
<div class="container h-100">
<div class="row justify-content-center align-items-center h-100">
<div class="col-12 col-md-6 d-flex justify-content-center">
<h1 class="text-center">
Articolo con id {{$article->id}}
</h1>
</div>
</div>
</div>
</header>

<div class="container">
<div class="row mt-3">
<div class="col-12 col-md-4">
<div class="card" style="width: 18rem;">
<img src="{{Storage::url($article->img)}}" class="card-img-top" alt="...">
<div class="card-body">
<h5 class="card-title">{{$article->title}}</h5>
<p class="card-subtitle">{{$article->subtitle}}</p>
<p class="card-text">{{$article->body}}</p>
<a href="{{route('article.index',compact('article'))}}" class="btn btn-primary p-5 border-bottom rounded-4">Ritorna a visualizzare tutti gli articoli</a>
</div>
</div>
</div>
</div>
</div>
</x-layout>