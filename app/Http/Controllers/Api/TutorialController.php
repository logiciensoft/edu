<?php

namespace App\Http\Controllers\Api;

use App\Repositories\TutorialRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorialController extends Controller
{
    private $repository;

    public function __construct(TutorialRepository $repository)
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
            'content' => 'required',
        ]);

        //persist & return the created data
        return $this->repository->create(
                $request->input('content')
            );
    }

    public function update(Request $request, $id)
    {
        //validate data
        $request->validate([
            'content' => 'required',
        ]);

        //persist & return the updated data
        return $this->repository->update(
                $id,
                $request->input('content')
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
