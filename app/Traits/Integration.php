<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use App\Models\Operation;
use App\Mail\DemoMail;
use App\Models\User;
use Mail;

trait Integration
{

    public function sendEmail($id){

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

    public function sendSMS($id){

        try {
            $account = '10026962';
            $apiKey = 'YiRIJVtFYEsGyx5MwyF1wVG6GyVAy9';
            $token = '64578812c5cd9ff2cb221fe1fac70311';

            // Buscar operacion
            $operation = Operation::findOrFail($id);

            // Estructura de informacion para el mensaje
            $client = $operation->client?->social_reason;
            $pilot = $operation->userPilot?->name;
            $phone = "57" . $operation->userPilot?->phone;
            $created_at = $operation->created_at?->format('d/m/Y');
            $link = route('operation.accept', $operation->id);

            // Mensaje de texto estructura
            $sms = "Hola, " . $pilot .
                ", Ha recibido una notificación para la operación " . $id . 
                ", para el cliente " . $client . 
                ", para continuar ingrese al siguiente enlace " . $link;
            
            $data = [
                'toNumber' => $phone,
                'sms' => $sms,
                'flash' => '0',
                'sc' => '890202',
                'request_dlvr_rcpt' => '0',
            ];

            $url = 'https://api103.hablame.co/api/sms/v3/send/priority';

            $response = Http::withHeaders([
                'Account' => $account,
                'ApiKey' => $apiKey,
                'Token' => $token,
            ])->post($url, $data);

            // Verifica si la solicitud fue exitosa
            if ($response->successful()) {
                $responseData = $response->json();
            } else {
                $responseData = $response->json();
            }

            return response()->json($responseData, 200);

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }

    }

}
