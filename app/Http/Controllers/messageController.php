<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;


class messageController extends Controller
{
    public function store(Request $request){  //inyecta la clase Request y la guarda en la variable
        //return request('name'); //es una forma simplificada de obtener los valores, no se requiere parametro Request $request y  use Illuminate\Http\Request;
        //return $request->get('name');
        $message = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:3',
        ],[
           'name.required' => 'Nombre obligatorio'
        ]);

        Mail::to('jose.ibarra@lottuseducation.com')->queue(new MessageReceived($message));// o send/queue genera el return y encoal el proceso
        return back()->with('status','Recibimos tu mensaje, te contestaremos en 24 horas'); //retorna a la ultima petición

    }
}
