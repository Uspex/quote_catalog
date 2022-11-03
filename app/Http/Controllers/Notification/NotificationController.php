<?php

namespace App\Http\Controllers\Notification;


use App\Http\Controllers\Controller;
use App\Jobs\NotificationJob;
use App\Models\Notification;
use App\Repositories\QuoteRepository;
use Illuminate\Http\Request;

/**
 * Уведомления
 * Class NotificationController
 * @package App\Http\Controllers\Notification
 */
class NotificationController extends Controller
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
     * Отправка уведомлений
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendQuoteAjax(Request $request)
    {
        $data = $request->all();

        $quote = $this->quoteRepository->getEdit($data['object_id']);

        if(!$quote){
            return response()->json(['message'=> 'Error!!! смотреть логи' ], 500);
        }

        $data['object_type'] = 'quote';
        $data['message'] = $quote->quote . ' <br> Автор: '.$quote->author ;

        $item = new Notification($data);
        $item->save();

        if ($item) {
            NotificationJob::dispatch($item->id);
            return response()->json(['message'=> 'Вы успешно поделились цитатой ['.$data['source'].']' ], 200);
        } else {
            return response()->json(['message'=> 'Error!!! смотреть логи' ], 500);
        }
    }

}
