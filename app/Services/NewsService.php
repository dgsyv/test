<?php

namespace App\Services;

use App\Models\News;

class NewsService
{
    public function getAll()
    {
        return News::latest()->get();
    }

    public function findById($id)
    {
        return News::find($id);
    }

    public function create($data)
    {
        return News::create([
            'title' => $data['title'],
            'slug' => \Str::slug($data['title']),
            'content' => $data['content'],
            'category_id' => $data['category_id']
        ]);
    }

    public function update($id, $data)
    {
        $news = News::find($id);

        if (!$news) return null;

        $news->update([
            'title' => $data['title'],
            'slug' => \Str::slug($data['title']),
            'content' => $data['content'],
            'category_id' => $data['category_id']
        ]);

        return $news;
    }

    public function delete($id)
    {
        return News::destroy($id);
    }
}
