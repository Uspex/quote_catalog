<?php

namespace App\Http\Controllers\Notification;


use App\Http\Controllers\Controller;
use App\Jobs\NotificationJob;
use App\Models\Notification;
use Illuminate\Http\Request;

/**
 * Уведомления
 * Class NotificationController
 * @package App\Http\Controllers\Notification
 */
class NotificationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendAjax(Request $request)
    {
        $data = $request->all();

        $item = new Notification($data);
        $item->save();

        if ($item) {
            NotificationJob::dispatch($item->id);
            return response()->json(['message'=> 'Вы успешно поделились цитатой' ], 200);
        } else {
            return response()->json(['message'=> 'Error!!! смотреть логи' ], 500);
        }
    }

}
