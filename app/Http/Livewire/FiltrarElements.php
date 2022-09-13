<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;
use App\Models\Proveidor;

class FiltrarElements extends Component
{

    public $terme;
    public $client;
    public $proveidor;

    public function leerDatosFormulario(){
        $this->emit('termesCerca');
    }

    public function render()
    {
        $clients = Client::all();
        $proveidors = Proveidor::all();
        return view('livewire.filtrar-elements', [
            'clients' => $clients,
            'proveidors' => $proveidors
        ]);
    }
}
