<?php

namespace App\Http\Controllers\Api\Quote;


use App\Http\Controllers\Controller;
use App\Http\Requests\Quote\QuoteCreateRequest;
use App\Http\Requests\Quote\QuoteUpdateRequest;
use App\Models\Quote;
use App\Models\User;
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
     * Список цитат
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $paginator = $this->quoteRepository->getPaginate(20);

        if ($paginator) {
            return response()->json([
                'data' => $paginator,
                'message' => 'success'
            ], 200);
        } else {
            return response()->json([
                'data' => [],
                'message'   => 'Ошибка получение данных',
            ], 500);
        }
    }


    /**
     * Добавление новой цитаты
     *
     * @param QuoteCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(QuoteCreateRequest $request)
    {
        $data = $request->all();
        if(!isset($data['editor_id'])){
            $user = User::first();

            $data['editor_id'] = $user->id;
        }

        $item = new Quote($data);
        $item->save();

        if ($item) {
            return response()->json([
                'data' => $item,
                'message' => trans('quote.create.success')
            ], 200);
        } else {
            return response()->json([
                'data' => [],
                'message'   => trans('quote.create.error'),
            ], 500);
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
