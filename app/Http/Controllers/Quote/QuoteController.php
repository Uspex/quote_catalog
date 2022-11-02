<?php

namespace App\Http\Controllers\Quote;


use App\Http\Controllers\Controller;
use App\Http\Requests\Quote\QuoteCreateRequest;
use App\Http\Requests\Quote\QuoteUpdateRequest;
use App\Models\Quote;
use App\Repositories\QuoteRepository;
use Illuminate\Support\Facades\Auth;

/**
 * Цитаты
 * Class QuoteController
 * @package App\Http\Controllers\Quote
 */
class QuoteController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $paginator = $this->quoteRepository->getPaginate(20, ['editor_id' => Auth::id(), 'delete_show' => true]);

        return view('quote.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $item = new Quote();

        return view('quote.create',compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuoteCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(QuoteCreateRequest $request)
    {
        $data = $request->all();
        $data['editor_id'] = Auth::id();

        $item = new Quote($data);
        $item->save();

        if ($item) {
            return redirect()
                ->route('quote.index')
                ->with(['success' => trans('quote.create.success')]);
        } else {
            return back()
                ->withErrors(['msg' => trans('quote.create.error')])
                ->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = $this->quoteRepository->getEdit($id);

        $this->checkItem($item);

        return view('quote.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QuoteUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(QuoteUpdateRequest $request, $id)
    {
        $item = $this->quoteRepository->getEdit($id);

        $data = $request->all();
        $data['editor_id'] = Auth::id();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('quote.index')
                ->with(['success' => trans('quote.update.success')]);
        } else {
            return back()
                ->withErrors(['msg' => trans('quote.update.error')])
                ->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $item = $this->quoteRepository->getEdit($id);

        $this->checkItem($item);

        $result = $item->delete();

        if ($result) {
            return redirect()
                ->route('quote.index')
                ->with(['success' => trans('quote.delete.success')]);
        } else {
            return back()
                ->withErrors(['msg' => trans('quote.delete.error')])
                ->withInput();
        }
    }

}
