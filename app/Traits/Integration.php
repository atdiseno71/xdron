<?php

namespace App\Traits;

use Mail;
use App\Models\User;
use App\Mail\PilotMail;
use App\Models\Operation;
use App\Models\Assistant;
use App\Mail\AssitentMail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait Integration
{

    public function sendEmail($id, $assistant_id){

        try {

            $operation = Operation::findOrFail($id);

            $assistant = Assistant::find($assistant_id);

            $pilot = User::findOrFail($operation->pilot_id);

            $detail_message = "#$operation->id";

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
            Log::info("Response " . $th->getMessage());
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

            // Buscamos el Tanqueador
            $assistant = Assistant::find($assistant_id);

            // Estructura de informacion para el mensaje
            $assistant_one = $operation->assistant_one?->name;
            $assistant_two = $operation->assistant_two?->name;
            $client = $operation->client?->social_reason;
            $pilot = $operation->userPilot?->name;
            $date_operation = $operation->date_operation?->format('d/m/Y');
            $observation_admin = $operation->observation?->observation_admin;
            $observation_asistent_one = $operation->observation?->observation_asistent_one;
            $type_product = $operation->product?->name;
            $link = route('operation.accept', $operation->id);
            // Guardamos el número de telefono
            if ($assistant != null) {
                $phone = "57" . $assistant?->phone;
                // Mensaje de texto estructura
                $sms = "Operación No. $operation->id, " .
                    "Fecha operación. $date_operation, " .
                    "Cliente. $client, " .
                    "Piloto. $pilot, " .
                    "Tipo aplicación. $type_product, " .
                    "Observación. $observation_asistent_one";
            } else {
                $phone = "57" . $operation->userPilot?->phone;
                // Mensaje de texto estructura
                if ($operation->assistant_two != null) {
                    $sms = "Operación No. $operation->id, " .
                        "Fecha operación. $date_operation, " .
                        "Cliente. $client, " .
                        "Tanqueador 1. $assistant_one, " .
                        "Tanqueador 2. $assistant_two, " .
                        "Tipo aplicación. $type_product, " .
                        "Observación. $observation_admin, ";
                } else {
                    $sms = "Operación No. $operation->id, " .
                        "Fecha operación. $date_operation, " .
                        "Cliente. $client, " .
                        "Tanqueador 1. $assistant_one, " .
                        "Tipo aplicación. $type_product, " .
                        "Observación. $observation_admin, ";
                }

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
