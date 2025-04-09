<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.test')]
class TestLivewire extends Component
{

    public $count = 0;


    public function increment()
    {
        $this->count++;
    }
    public function decrement()
    {
        $this->count--;
    }
    public function resetCount()
    {
        $this->count = 0;
    }

    public function render()
    {
        return view('livewire.test-livewire');
    }
}
