<x-layout>
<header class="header">
<div class="container h-100">
<div class="row justify-content-center align-items-center h-100">
<div class="col-12 col-md-6 d-flex justify-content-center">
<h1 class="text-center">
Inserisci un nuovo Articolo
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
action="{{route('article.store')}}" 
method="POST"
enctype="multipart/form-data">
@csrf
<div class="mb-3">
<label for="title" class="form-label">Titolo articolo</label>
<input  name="title" type="text" class="form-control" id="title" value="{{old('title')}}">
</div>
<div class="mb-3">
<label for="subtitle" class="form-label">Sottotitolo dell'articolo</label>
<input name="subtitle" id="subtitle" class="form-control" value="{{old('subtitle')}}" type="text">
</div>
<div class="mb-3">
<label for="body" class="form-label">Corpo dell'articolo</label>
<textarea name="body" id="body" cols="30" rows="10" class="form-control">{{old('body')}}</textarea>
</div>
<div class="mb-3">
<div class="mb-3">
<label for="img" class="form-label">Inserisci immagine</label>
<input  name="img" type="file" class="form-control" id="img">
</div>
<button type="submit" class="btn btn-primary">Crea articolo</button>
</form>
</div>
</div>
</div>
</x-layout>