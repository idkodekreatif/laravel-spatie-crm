<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DatabaseNotification $notification) {}
}
