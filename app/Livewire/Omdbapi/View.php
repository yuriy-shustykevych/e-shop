<?php

namespace App\Livewire\Omdbapi;

use Livewire\Component;

class View extends Component
{

    public $movieId, $responseData = [];

    public function mount($responseData, $movieId)
    {
        $this->responseData = $responseData;
        $this->movieId = $movieId;
    }

    public function render()
    {
        return view('livewire.omdbapi.view', [
            'responseData' => $this->responseData,
            'movieId' => $this->movieId,
        ]);
    }
}
