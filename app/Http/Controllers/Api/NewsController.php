<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\NewsService;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    // GET ALL
    public function index()
    {
        $data = $this->newsService->getAll();

        return response()->json([
            'status' => true,
            'message' => 'Data berita berhasil diambil',
            'data' => $data
        ]);
    }

    // DETAIL
    public function show($id)
    {
        $news = $this->newsService->findById($id);

        if (!$news) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail berita ditemukan',
            'data' => $news
        ]);
    }

    // CREATE
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $news = $this->newsService->create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Berita berhasil ditambahkan',
            'data' => $news
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $news = $this->newsService->update($id, $request->all());

        if (!$news) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Berita berhasil diperbarui',
            'data' => $news
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        $deleted = $this->newsService->delete($id);

        if (!$deleted) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Berita berhasil dihapus'
        ]);
    }
}
