<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use App\Models\Operation;
use App\Mail\DemoMail;
use Mail;

class MailController extends Controller
{
    public function index($id) {

        try {
            $operation = Operation::findOrFail($id);

            $detail_message = "#$operation->id para el cliente " . $operation->client?->social_reason;

            $mailData = [
                'data' => $operation,
            ];

            Mail::to('jorgetecno38981@gmail.com')->send(new DemoMail($mailData, $detail_message));

            return response()->json('Email send successfully', 200);

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }

    }
}
