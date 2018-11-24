<?php
namespace App\Repositories;

use App\Tutorial;
use Illuminate\Support\Facades\DB;

class TutorialRepository
{
    public function all()
    {
        return Tutorial::with('subjects')
            ->orderBy('id')
            ->get();
    }

    public function create($content)
    {
        $tutorial = Tutorial::create(['content'=>$content]);

        return $tutorial;
    }

    public function update($id, $content)
    {
        $tutorial = Tutorial::findOrFail($id);

        $tutorial->update(['content'=>$content]);

        return $tutorial;
    }

    public function get($id)
    {
        return Tutorial::with('subjects')
            ->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->get($id)->delete();
    }
}