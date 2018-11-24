<?php

namespace App\Http\Controllers\Api;

use App\Repositories\QuizRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    private $repository;

    public function __construct(QuizRepository $repository)
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
            'name' => 'required',
            'questions' => 'nullable|array'
        ]);

        //persist & return the created data
        return $this->repository->create(
                $request->input('name'),
                $request->input('questions')
            );
    }

    public function update(Request $request, $id)
    {
        //validate data
        $request->validate([
            'name' => 'required',
            'questions' => 'nullable|array'
        ]);

        //persist & return the updated data
        return $this->repository->update(
                $id,
                $request->input('name'),
                $request->input('questions')
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
