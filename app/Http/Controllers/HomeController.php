<?php

namespace App\Http\Controllers;

use App\Repositories\QuoteRepository;

class HomeController extends Controller
{
    /**
     * @var QuoteRepository
     */
    private $quoteRepository;

    public function __construct()
    {

        $this->quoteRepository = app(QuoteRepository::class);
    }
    /**
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function homepage()
    {
        $quote_paginator = $this->quoteRepository->getPaginate(5);

        return view('homepage', compact('quote_paginator'));
    }

    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('dashboard');
    }
}
