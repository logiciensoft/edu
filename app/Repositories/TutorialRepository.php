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
        $subject = Tutorial::create(['content'=>$content]);

        return $subject;
    }

    public function update($id, $content)
    {
        $subject = Tutorial::findOrFail($id);

        $subject->update(['content'=>$content]);

        return $subject;
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