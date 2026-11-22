<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function homepage()
    {
        $latestArticles = Article::latest()->take(3)->get();
        return view('welcome', compact('latestArticles'));
    }

    public function contactForm()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email',
            'message' => 'required|string|max:2000',
        ]);

        Mail::raw(
            "Messaggio da: {$data['name']} ({$data['email']})\n\n{$data['message']}",
            function ($mail) use ($data) {
                $mail->to('atelier@disegni-arte.test')
                    ->replyTo($data['email'], $data['name'])
                    ->subject('Nuovo contatto dall\'Atelier da ' . $data['name']);
            }
        );

        return redirect()->route('contact')->with('success', 'Messaggio inviato! Controlla la tua casella Mailtrap.');
    }
}