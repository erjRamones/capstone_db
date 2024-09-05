<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalityStoreRequest;
use App\Interface\Service\PersonalityServiceInterface;
use Illuminate\Http\Request;

class PersonalityController extends Controller
{

    private $studentService;
    public function __construct(PersonalityServiceInterface $studentService) {
        
        $this->$studentService= $studentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->studentService->findPersonality();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonalityStoreRequest $request)
    {
        return $this->studentService->createPersonality($request);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return $this->studentService->findPersonalityById($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonalityStoreRequest $request, int $id)
    {
        return $this->studentService->updatePersonality($request, $id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->studentService->deletePersonality($id);

    }
}
