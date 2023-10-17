<?php

namespace App\Traits;

use App\Models\Operation;
use App\Mail\DemoMail;
use App\Models\User;
use Mail;

trait Email
{

    public function send($id){

        try {
            $operation = Operation::findOrFail($id);

            $pilot = User::findOrFail($operation->pilot_id);

            $detail_message = "#$operation->id para el cliente " . $operation->client?->social_reason;

            $mailData = [
                'data' => $operation,
            ];

            Mail::to($pilot->email)->send(new DemoMail($mailData, $detail_message));

            return response()->json('Email send successfully', 200);

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }

    }

}
