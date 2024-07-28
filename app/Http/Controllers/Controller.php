<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function upload($file, $path = 'assets/uploads/')
    {
        $file_name = null;

        if ($file) {
            $file_name = encrypt(time()) . '.' . $file->getClientOriginalExtension();
            $public_path = public_path($path);
            $file->move(public_path($path), $file_name);
        }

        return $path.$file_name;
    }

}
