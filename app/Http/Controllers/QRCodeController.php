<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function generate(Request $request)
    {
        $data = $request->input('data'); // Get the data to encode in the QR code
        $size = $request->input('size', '150x150'); // Get the size, default is 150x150

        // QR Code API URL
        $url = "https://api.qrserver.com/v1/create-qr-code/?data=" . urlencode($data) . "&size=" . $size;

        return view('qr.index', ['qrCodeUrl' => $url]);
    }
}
