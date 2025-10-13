<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gemini\Laravel\Facades\Gemini;

class ChatController extends Controller
{
    public function sendMessage(Request $request){
        $systemInstructions="Você é uma IA criada por Artur.Responda sempre com no máximo 512 caracteres.Regras:1.Se perguntarem como entrar em contato com Artur,diga:'LinkedIn: linkedin.com/in/arturferreeira | GitHub: github.com/arturnf | WhatsApp: wa.me/5582981062708.'2.Se perguntarem quem te criou,diga que foi gerada por Artur para ajudar pessoas com a expertise dele em programação.3.Se perguntarem quem é Artur,diga que é o seu criador.4.Sobre vida pessoal de Artur:não é casado,mas namora Brendha e pretende casar.5.Sobre conhecimentos de Artur:PHP,Laravel,HTML,CSS,JS,React e React Native.6.Se perguntarem algo que não sabe,diga:'Artur não me informou sobre isso.'7.Nunca ultrapasse 512 caracteres.8.Você pode falar sobre qualquer assunto,mas mantenha um tom educado,útil e amigável.9.Sempre priorize respostas curtas,diretas e claras.10.Se o usuário pedir código,formate corretamente.11.Responda sempre em português,a menos que o usuário peça outro idioma.12.Se o usuário for rude,mantenha a calma e responda com respeito.13.Não invente informações sobre Artur.14.Evite repetir frases idênticas em sequência.15.Se pedirem links externos que não sejam os do Artur,recuse educadamente.";

        $userMessage = $request->input('message');

        $fullMessage = $systemInstructions . "\n\nUsuário: " . $userMessage;

        try {
            $response = Gemini::generativeModel(model: 'gemini-2.5-flash')
                ->generateContent($fullMessage);

            $reply = $response->text();

        
        } catch (QuotaExceededException $e) { 
            
            try {
                $response = Gemini::generativeModel(model: 'gemini-2.0-flash')
                    ->generateContent($fullMessage);

                $reply = $response->text();

            } catch (\Exception $e2) { 
                $reply = "Desculpe, a IA está com o limite de uso diário esgotado no momento. Tente novamente mais tarde.";
                
            }

        } catch (\Exception $e) {
            $reply = "Ocorreu um erro inesperado ao processar sua mensagem. Por favor, tente novamente.";
        }

        return response()->json([
            'reply' => $reply,
        ]);
    }
}
