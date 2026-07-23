<x-layout>
<header class="header">
<div class="container h-100">
<div class="row justify-content-center align-items-center h-100">
<div class="col-12 col-md-6 d-flex justify-content-center">
<h1 class="text-center">
I miei prodotti
</h1>
</div>
</div>
</div>
</header>
<x-display-message/>
<div class="container">
<div class="row my-5">
@foreach($products as $product)
<div class="col-12 col-md-4">
<x-card
name="{{$product->name}}"
:product="$product"></x-card>
</div>
@endforeach
</div>
</div>
</x-layout>