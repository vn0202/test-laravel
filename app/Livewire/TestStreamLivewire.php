<?php

namespace App\Livewire;

use App\Models\Property;
use Livewire\Component;

class TestStreamLivewire extends Component
{
    public $ids =  [];
    public function process(){
        foreach ($this->ids as $id => $detail){
            $this->ids[$id]['status'] = "WIP";

//            dd($this->ids);
            $this->stream(to:'process'. $id,content:$this->ids[$id]['status'],replace: true);

            sleep(2);
            $this->ids[$id]['status'] = "ok";
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
