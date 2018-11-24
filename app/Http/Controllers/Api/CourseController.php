<?php

namespace App\Http\Controllers\Api;

use App\Repositories\CourseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    private $repository;

    public function __construct(CourseRepository $repository)
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
            'name' => 'required|unique:courses,name',
            'subject_ids' => 'nullable|array'
        ]);

        //persist & return the created data
        return $this->repository->create(
                $request->input('name'),
                $request->input('subject_ids')
            );
    }

    public function update(Request $request, $id)
    {
        //validate data
        $request->validate([
            'name' => 'required|unique:courses,name,'.$id.',id',
            'subject_ids' => 'nullable|array'
        ]);

        //persist & return the updated data
        return $this->repository->update(
                $id,
                $request->input('name'),
                $request->input('subject_ids')
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
