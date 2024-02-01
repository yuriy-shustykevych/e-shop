<?php

namespace App\Livewire\Omdbapi;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class Index extends Component
{

    public $responseData, $apikey='f0605eaa', $title, $type, $pageNumber = 1, $movieId;


    public function mount($responseData, $pageNumber, $title)
    {
        $this->responseData = $responseData;
        $this->pageNumber = $pageNumber;
        $this->title = $title;
    }

    public function render()
    {
        return view('livewire.omdbapi.index');
    }
}
