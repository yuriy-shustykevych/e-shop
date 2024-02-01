<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Mail\OmdbapiEmail;
use PDF;
use Mail;

class OmdbapiController extends Controller
{

    public $responseData, $apikey='f0605eaa', $title, $type, $pageNumber = 1, $movieId;

    public function movieDetails($movieId)
    {
        $this->responseData = Http::get('https://www.omdbapi.com/?apikey='.$this->apikey.'&i='.$movieId);
        return view('omdbapi.view', ['responseData'=>$this->responseData->json(), 'movieId' => $this->movieId, 'title'=> $this->title]);
    }

    public function emailSend(Request $request, $movieId)
    {
        $this->responseData = Http::get('https://www.omdbapi.com/?apikey='.$this->apikey.'&i='.$movieId);
        $data["email"] = $request->receiverName;
        $data["title"] = $request->emailTitle;
        $data["body"] = $request->emailText;

        $pdf = PDF::loadView(
            'omdbapi.attachment',
            [
                'responseData'=>$this->responseData->json(),
                'movieId' => $this->movieId, $data
            ])->setOptions(['defaultFont' => 'sans-serif']);
        $data["pdf"] = $pdf;

        Mail::to($data["email"])->send(new OmdbapiEmail($data));

        return redirect()->back();
    }

   public function index(Request $request)
   {
       $perPage = 10;
       $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();

       if($request->title){
           $this->title = $request->title;
       }

       if($request->type){
           $this->type = $request->type;
       }

       if($request->page)
       {
           $response = Http::get('http://www.omdbapi.com/', [
               'apikey' => $this->apikey,
               's' => $this->title,
               'type' => $this->type,
               'page' => $request->page
           ]);

           $data = json_decode($response->getBody(), true);

           $currentItems = array_slice($data['Search'], ($currentPage - 1) * $perPage, $perPage);

           $paginatedCollection = new \Illuminate\Pagination\LengthAwarePaginator(
               $currentItems,
               $data['totalResults'],
               $perPage,
               $currentPage,
               ['path' => '/omdbapi?title='.$this->title.'&type='.$this->type]
           );

           $this->pageNumber = $paginatedCollection;

           $this->responseData = $data['Search'];
       }
       elseif ($request->title) {

           $response = Http::get('http://www.omdbapi.com/', [
               'apikey' => $this->apikey,
               's' => $this->title,
               'type' => $this->type
           ]);

           $data = json_decode($response->getBody(), true);

           $currentItems = array_slice($data['Search'], ($currentPage - 1) * $perPage, $perPage);

           $paginatedCollection = new \Illuminate\Pagination\LengthAwarePaginator(
               $currentItems,
               $data['totalResults'],
               $perPage,
               $currentPage,
               ['path' => '/omdbapi?title='.$this->title.'&type='.$this->type]
           );

           $this->pageNumber = $paginatedCollection;

           $this->responseData = Collection::make($paginatedCollection->items());
       }
       return view('livewire.omdbapi.index', ['responseData'=>$this->responseData, 'pageNumber' => $this->pageNumber, 'title'=> $this->title]);
   }
}
