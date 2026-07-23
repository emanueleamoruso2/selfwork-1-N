<x-layout>
<header class="header">
<div class="container h-100">
<div class="row justify-content-center align-items-center h-100">
<div class="col-12 col-md-6 d-flex justify-content-center">
<h1 class="text-center">
Modifica articolo : {{$article->id}} con titolo {{$article->title}}
</h1>
</div>
</div>
</div>
</header>

<x-display-message/>
<x-display-errors/>


<div class="container">
<div class="row mt-5 justify-content-center">
<div class="col-12 col-md-6 justify-content-center">
<form class="rounded-4 shadow bg-secondary-title p-3" 
action="{{route('article.update',compact('article'))}}" 
method="POST"
enctype="multipart/form-data">
@csrf
@method('PUT')  {{-- Override del metodo, stiamo sovrascrivendo il metodo originale che era POST. Il termine corretto è Spoofing cioè stiamo cambiando l'operazione di base del post facendo un raggiro del post --}}
<div class="mb-3">
<label for="title" class="form-label">Titolo articolo</label>
<input  name="title" type="text" class="form-control" id="title" value="{{$article->title}}">
</div>
<div class="mb-3">
<label for="subtitle" class="form-label">Sottotitolo dell'articolo</label>
<input name="subtitle" id="subtitle" class="form-control" value="{{$article->subtitle}}" type="text">
</div>
<div class="mb-3">
<label for="body" class="form-label">Corpo dell'articolo</label>
<textarea name="body" id="body" cols="30" rows="10" class="form-control">{{$article->body}}</textarea>
</div>
<div class="mb-3">
<span class="form-label">Immagine attuale:</span>
<img src="{{Storage::url($article->img)}}" alt="{{$article->title}}" width="400" height="200">
</div>
<div class="mb-3">
<label for="img" class="form-label">Inserisci immagine</label>
<input  name="img" type="file" class="form-control" id="img">
</div>
<button type="submit" class="btn btn-primary">Modifica articolo</button>
</form>
</div>
</div>
</div>
</x-layout>