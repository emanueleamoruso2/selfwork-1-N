<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public $count=1;
    public $num=5;

    public function increment(){
        return $this->count++;
    }

    public function decrement(){
        return $this->count--;
    }

     public function incrementbynum($num){
        return $this->count+=$num;
    }

      public function decrementbynum($num){
        return $this->count-=$num;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
