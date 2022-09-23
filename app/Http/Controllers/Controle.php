<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;

class Controle extends Controller
{
    public function cadastro(Request $request)
    {
        $dataform = $request->all();

        $album = new Cadastro();
        $album->descricao = $dataform['descricao'];
        $album->cidade = $dataform['cidade'];
        $album->data = date("d-m-y");
        $album->save();

        $path = '/app/public/caps'.$album->id;
        $i = 0;

        foreach ($dataform['arquivo'] as $key => $file) {
            $image = $file;
            $nameimage = $i++.'.'.$image->getClientOriginalExtension();
            $uploadFiles = $image->storeAs($path, $album->id."-".$nameimage);
        }
        $hqs = Cadastro::orderBy('id', 'desc')->get();
        return view("home")->with('hqs', $hqs);
    }
}
