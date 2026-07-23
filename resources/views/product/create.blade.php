<x-layout>
<header class="header">
<div class="container h-100">
<div class="row justify-content-center align-items-center h-100">
<div class="col-12 col-md-6 d-flex justify-content-center">
<h1 class="text-center">
Inserisci un nuovo prodotto
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
action="{{route('product.store')}}" 
method="POST"
enctype="multipart/form-data">
@csrf
<div class="mb-3">
<label for="name" class="form-label">Nome del prodotto</label>
<input  name="name" type="text" class="form-control" id="name">
</div>
<div class="mb-3">
<label for="description" class="form-label">Descrizione del prodotto</label>
<textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
</div>
<div class="mb-3">
<label for="price" class="form-label">Prezzo del prodotto</label>
<div class="d-flex">
<input  name="price" type="text" class="form-control d-flex me-3" id="price"><span>€</span>
</div>
</div>
<div class="mb-3">
<label for="img" class="form-label">Inserisci immagine</label>
<input  name="img" type="file" class="form-control" id="img">
</div>
<button type="submit" class="btn btn-primary">Crea Prodotto</button>
</form>
</div>
</div>
</div>
</x-layout>