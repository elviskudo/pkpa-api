<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\UploadFiles;
use App\Services\TopicServices;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TopicController extends Controller
{
    protected $topicServices;

    public function __construct(TopicServices $topicServices)
    {
        $this->topicServices = $topicServices;
    }

    /**
     * List all topics
     */
    public function list(Request $request)
    {
        $topics = $this->topicServices->list($request);
        return response()->json($topics);
    }

    /**
     * Store a newly created topic
     */
    public function store(Request $request)
    {
        $topic = Topic::create([
            // Pastikan field2 ini sesuai `$fillable` di model Topic
            'uuid'       => Str::uuid(), // jika Anda pakai UUID
            'course_id'  => $request->course_id, 
            'name'       => $request->name,
            'order'      => $request->order,
            // dsb
        ]);
    
        // 3. Simpan batch jika ada
        if ($request->has('batches') && is_array($request->batches)) {
            foreach ($request->batches as $batchData) {
                $batch = $topic->batches()->create([
                    'uuid'        => Str::uuid(), // jika pakai UUID
                    'name'        => $batchData['title'] ?? 'Untitled Batch',
                    'description' => $batchData['description'] ?? null,
                    'order'       => $batchData['order'] ?? 1,
                    // dsb.
                ]);
    
                // 4. Simpan upload_files jika ada
                if (!empty($batchData['uploaded_files'])) {
                    foreach ($batchData['uploaded_files'] as $fileData) {
                        UploadFiles::create([
                            'uuid'        => Str::uuid(),
                            'name'        => $fileData['name'],
                            'model'       => $fileData['model'],          // "App\\Models\\Batch"
                            'relation_id' => $batch->uuid,                // pk/uuid batch
                            'url_name'    => $fileData['url_name'],
                            'file_type'   => $fileData['file_type'],
                            'file_url'    =>$fileData['file_url'],
                            'uploaded_at' => $fileData['uploaded_at'] ?? now(),
                            // dsb
                        ]);
                    }
                }
            }
        }
    
        return response()->json($topic->load('batches'), 201);
    }

    /**
     * Update an existing topic
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        $topic = $this->topicServices->update($id, $data);
        return response()->json($topic, 200);
    }

    /**
     * Delete a topic
     */
    public function destroy($id)
    {
        $topic = $this->topicServices->delete($id);
        return response()->json(['message' => 'Topic deleted successfully'], 200);
    }
}
