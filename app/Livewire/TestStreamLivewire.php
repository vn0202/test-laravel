<?php

namespace App\Livewire;

use App\Models\Property;
use Livewire\Component;

class TestStreamLivewire extends Component
{
    public $ids =  [];
    public function process(){
        foreach ($this->ids as $id => $detail){
            if($detail['checked'])
            {
                $this->ids[$id]['status'] = "WIP";
                $this->stream(to:"process$id" ,content:$this->ids[$id]['status'],replace: true);
                sleep(2);
                $this->ids[$id]['status'] = "ok";
                $this->stream(to:"process$id" ,content:$this->ids[$id]['status'],replace: true);
            }

        }
    }

    public function render()
    {
        // Pass properties for sale data to the view
        return view('livewire.test-stream-livewire',[
            'properties'=>
                Property::paginate(10)
        ]);
    }

}
