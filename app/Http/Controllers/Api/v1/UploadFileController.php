<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function index(Request $request)
    {

        // bisognerebbe popolare questa funzione di maggiori controlli// bisognerebbe controllare peso ed estensioni del file
        $return = array();
        if ($request->hasfile('fileDaScaricare')) {
            foreach ($request->file('fileDaScaricare') as $file) {
                $name = time() . '.' . $file->getClientOriginalName();
                $file->move(public_path() . '/files', $name);
                // $data[] = $name;
            }
            $return["data"] = true;
        } else {
            $return["data"] = false;
        }
        return json_encode($return);
    }
}
