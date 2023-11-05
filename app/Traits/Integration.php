<?php

namespace App\Traits;

use Mail;
use App\Models\User;
use App\Mail\PilotMail;
use App\Models\Operation;
use App\Models\Assistant;
use App\Mail\AssitentMail;
use Illuminate\Support\Facades\Http;

trait Integration
{

    public function sendEmail($id, $assistant_id){

        try {
            
            $operation = Operation::findOrFail($id);

            $assistant = Assistant::find($assistant_id);

            $pilot = User::findOrFail($operation->pilot_id);

            $detail_message = "#$operation->id para el cliente " . $operation->client?->social_reason;

            $mailData = [
                'data' => $operation,
                'assistant' => $assistant ?? '',
            ];

            if ($assistant != null) {
                Mail::to($assistant->email)->send(new AssitentMail($mailData, $detail_message));
            } else {
                Mail::to($pilot->email)->send(new PilotMail($mailData, $detail_message));
            }

            return response()->json('Email send successfully', 200);

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }

    }

    public function sendSMS($id, $assistant_id){

        try {
            $account = '10026962';
            $apiKey = 'YiRIJVtFYEsGyx5MwyF1wVG6GyVAy9';
            $token = '64578812c5cd9ff2cb221fe1fac70311';

            // Buscar operacion
            $operation = Operation::findOrFail($id);

            // Buscamos el asistente
            $assistant = Assistant::find($assistant_id);

            // Estructura de informacion para el mensaje
            $assistant_one = $operation->assistant_one?->name;
            $assistant_two = $operation->assistant_two?->name;
            $client = $operation->client?->social_reason;
            $client = $operation->client?->social_reason;
            $pilot = $operation->userPilot?->name;
            $created_at = $operation->created_at?->format('d/m/Y');
            $link = route('operation.accept', $operation->id);
            // Guardamos el número de telefono
            if ($assistant != null) {
                $phone = "57" . $assistant?->phone;
                // Mensaje de texto estructura
                $sms = "Hola, " . $assistant?->name .
                    ", Ha recibido una notificación para la operación " . $id . 
                    ", para el cliente " . $client . 
                    ", acompañaras al piloto " . $pilot;
            } else {
                $phone = "57" . $operation->userPilot?->phone;
                $sms = "Hola, " . $pilot .
                    ", Ha recibido una notificación para la operación " . $id . 
                    ", para el cliente " . $client . 
                    ", para continuar ingrese al siguiente enlace " . $link;
            }
            
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
