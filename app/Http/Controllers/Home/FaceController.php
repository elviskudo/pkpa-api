<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Face;
use App\Models\Student;
use App\Services\FaceServices;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Log;


class FaceController extends Controller
{
    //Constructor
    public FaceServices $faceServices;

    public function __construct(FaceServices $faceServices)
    {
        $this->faceServices=$faceServices;
    }


    public function create(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'student_email' => 'required|email|exists:students,email',
        ]);

        $image = $request->file('image');
        $email = $request->input('student_email');
        $student = Student::where('email', $email)->first();

        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        try {
            // Mengunggah gambar ke Cloudinary
            $uploadResult = Cloudinary::upload($image->getRealPath(), [
                'public_id' => $email
            ]);
            $image_url = $uploadResult->getSecurePath();

            // Simpan data ke model Face
            $face = new Face();
            $face->student_id = $student->uuid;
            $face->image_url = $image_url;
            $face->save();

            // Kembalikan respons dengan data yang baru disimpan
            return response()->json($face, 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal mengunggah gambar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function compare($email)
    {
        try {
            // Ambil student berdasarkan email
            $student = Student::where('email', $email)->first();

            // Periksa apakah student ditemukan
            if (!$student) {
                return response()->json(['error' => 'Student not found.'], 404);
            }

            // Ambil face berdasarkan student_id
            $face = $student->face;

            // Periksa apakah face ditemukan
            if (!$face) {
                return response()->json(['error' => 'Face not found.'], 404);
            }

            // Kembalikan respons JSON
            return response()->json([
                'image_url' => $face->image_url,
                'name' => $student->name,
            ]);
        } catch (\Exception $e) {
            // Log kesalahan
            Log::error('Error in compare method: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

}
