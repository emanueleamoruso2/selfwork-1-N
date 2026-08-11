<div>
   <div class="container-fluid my-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-10">
            <p class="display-4 text-white fw-bold"> @if($count>2) {{$count}} @else Ancora sono inferiore a 2 @endif</p>
            <label for="num">Decidi lo step di incremento/decremento</label>
            <input type="number" name="num" id="num" value="{{$num}}" wire:model.live="num" class="form-control w-25 my-5">
            <button wire:click="increment" class="btn btn-danger p-3">Aumenta +1</button>
            <button wire:click="decrement" class="btn btn-warning p-3">Decrementa -1</button>
             <button wire:click="incrementbynum(@if($num) {{$num}} @else 0 @endif)" class="btn btn-secondary p-3">Aumenta di @if($num) {{$num}} @else 0 @endif</button>
            <button wire:click="decrementbynum(@if($num) {{$num}} @else 0 @endif)" class="btn btn-success p-3">Decrementa di @if($num) {{$num}} @else 0 @endif</button>
        </div>
    </div>
   </div>
</div>
