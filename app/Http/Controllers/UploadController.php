<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadBuktiRequest;
use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    function uploadBukti(UploadBuktiRequest $request) {
        $typeFile = $request->file('bukti')->getClientOriginalExtension();
        $bukti = "data:image/".$typeFile.";base64,".base64_encode(file_get_contents($request->file('bukti')));
        $upload = Upload::create(['bukti' => $bukti]);

        if($upload) {
            return response()->json(['message' => 'Bukti telah diupload']);
        }
    }
}
