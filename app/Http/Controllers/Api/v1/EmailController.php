<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function inviaEmail(Request $request)
    {
        try {
            // Validazione dei dati del modulo
            $request->validate([
                'email' => 'required|email',
            ]);

            // Dati per l'email principale
            $data = [
                'testo' => 'Questo è il contenuto dell\'email.'
            ];

            // Invia l'email principale
            Mail::send('email.messaggio', $data, function ($message) use ($request) {
                $message->to($request->input('email'))
                    ->subject('Oggetto dell\'email');
            });

            $autoReplyMessage = 'Grazie di averci contattato. Il nostro staff si farà sentire quanto prima.'; // Testo fisso 

            // Invia la risposta automatica
            Mail::send([], [], function ($message) use ($request, $autoReplyMessage) {
                $message->to($request->input('email'))
                    ->subject('Risposta automatica')
                    ->setBody($autoReplyMessage, 'text/plain');
            });

            // Invia i dati del modulo a info@developpo.com
            Mail::send('email.info', $request->all(), function ($message) {
                $message->to('info@developpo.com')
                    ->subject('Dati del modulo di contatto inviati');
            });

            return response()->json(['message' => 'Email inviata con successo']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Errore nell\'invio dell\'email',
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ], 500);
        }
    }
}
