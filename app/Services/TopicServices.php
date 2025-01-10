<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Str;

class TopicServices
{
    /**
     * Dapat disesuaikan tergantung kebutuhan filtering Anda
     */
    public function list(Request $request)
    {
        $query = Topic::query();

        // Contoh filter by course_id
        if ($request->has('course_id') && $request->course_id !== '') {
            $query->where('course_id', $request->course_id);
        }

        // Contoh filter by name
        if ($request->has('name') && $request->name !== '') {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        // Anda bisa tambahkan filter lain sesuai kolom di tabel topics
        return $query->paginate(5);
    }

    /**
     * Membuat topic baru
     */
    public function create($data)
    {
        // Jika ingin membuat uuid otomatis (jika tabel topics memiliki kolom uuid)
        if (!isset($data['uuid'])) {
            $data['uuid'] = (string) Str::uuid();
        }

        $topic = Topic::create($data);
        return $topic;
    }

    /**
     * Meng-update topic yang ada
     */
    public function update($id, $data)
    {
        // Jika primary key adalah id (increment), gunakan findOrFail($id)
        // Jika primary key adalah uuid, gunakan misalnya findOrFailByUuid
        $topic = Topic::findOrFail($id);
        $topic->update($data);
        return $topic;
    }

    /**
     * Menghapus topic
     */
    public function delete($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();
        return $topic;
    }
}
