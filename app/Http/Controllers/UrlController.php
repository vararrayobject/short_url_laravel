<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUrlRequest;
use App\Repositories\Interfaces\UrlRepositoryInterface;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    protected $url;

    /**
    * Validate the user and get url data.
    *
    * @return void
    */
    public function __construct(UrlRepositoryInterface $urlModel) {
        
        $this->url = $urlModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $urls = \App\Models\Url::paginate(10);
        $urls = $this->url->all();
        return view('admin/urls/index', compact('urls'))->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/urls/edit-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUrlRequest $request)
    {
        $validated = $request->validated();
        // dd($validated);
        // convert the url into shortcode and save it in db
        $urls = $this->url->create($validated);




        $urls = $this->url->all();
        return redirect()->route('urls.index')
            ->with('success', 'Url Added successfully');
    }
}