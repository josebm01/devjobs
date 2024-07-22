<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        // $notificaciones = auth()->user()->notifications;
        // $notificaciones = auth()->user()->readNotifications;
        // $notificaciones = auth()->user()->unreadNotifications;

        // $notificaciones = auth()->user()->notifications;

        $user = $request->user();
        $notificaciones = $user->unreadNotifications()->get();



        // documentación

        // $user = User::find(8);
        // dd( $$user->notification );
        


        $notificaciones = [
            (object)[
                "data" => (object)[
                    "id_vacante" => 4,
                    "nombre_vacante" => "Laravel",
                    "usuario_id" => 8,
                ],
                "created_at" => Carbon::parse("2024-07-15 23:46:25")
            ],
            (object)[
                "data" => (object)[
                    "id_vacante" => 4,
                    "nombre_vacante" => "Laravel",
                    "usuario_id" => 8
                ],
                 "created_at" => Carbon::parse("2024-07-15 20:46:25")
            ]
        ];


        return view('notificaciones.index', [
            'notifications' => $notificaciones
        ]);
    }
}
