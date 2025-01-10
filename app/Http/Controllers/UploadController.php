<?php

namespace App\Http\Controllers;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validasi file untuk mendukung image, pdf, dan video dengan batas ukuran 10MB
        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,svg,pdf,mp4,mov,avi|max:10240', // 10MB max file size
        ]);

        // Mengambil ekstensi file
        $extension = $request->file('file')->getClientOriginalExtension();

        // Unggah file ke Cloudinary berdasarkan tipe file
        if (in_array($extension, ['jpeg', 'png', 'jpg', 'svg'])) {
            // Unggah gambar
            $uploadedFileUrl = Cloudinary::upload($request->file('file')->getRealPath())->getSecurePath();

        } elseif ($extension == 'pdf') {
            // Unggah PDF sebagai raw file
            $uploadedFileUrl = Cloudinary::upload($request->file('file')->getRealPath())->getSecurePath();

        } elseif (in_array($extension, ['mp4', 'mov', 'avi'])) {
            // Unggah video
            $uploadedFileUrl = Cloudinary::uploadVideo($request->file('file')->getRealPath(), ['resource_type' => 'video'])->getSecurePath();
        
        } else {
            return response()->json(['error' => 'Unsupported file type'], 400);
        }

        // Return URL file yang diunggah
        return response()->json(['url' => $uploadedFileUrl], 200);
    }
}