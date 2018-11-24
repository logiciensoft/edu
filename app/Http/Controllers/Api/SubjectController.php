<?php

namespace App\Http\Controllers\Api;

use App\Repositories\SubjectRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    private $repository;

    public function __construct(SubjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function store(Request $request)
    {
        //validate data
        $request->validate([
            'name' => 'required|unique:subjects,name',
            'quiz_ids' => 'nullable|array',
            'tutorial_ids' => 'nullable|array'
        ]);

        //persist & return the created data
        return $this->repository->create(
                $request->input('name'),
                $request->input('quiz_ids'),
                $request->input('tutorial_ids')
            );
    }

    public function update(Request $request, $id)
    {
        //validate data
        $request->validate([
            'name' => 'required|unique:subjects,name,'.$id.',id',
            'quiz_ids' => 'nullable|array',
            'tutorial_ids' => 'nullable|array'
        ]);

        //persist & return the updated data
        return $this->repository->update(
            $id,
            $request->input('name'),
            $request->input('quiz_ids'),
            $request->input('tutorial_ids')
        );
    }

    public function show($id)
    {
        return $this->repository->get($id);
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
    }
}
