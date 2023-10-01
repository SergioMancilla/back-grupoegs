<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Services\PasswordEncryptionService;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $passwordEncryptionService;

    public function __construct(PasswordEncryptionService $passwordEncryptionService) {
        $this->passwordEncryptionService = $passwordEncryptionService;
    }

    public function index()
    {
        $people = Person::all();
        return response()->json($people);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $person = new Person;

        $person->document_type = $request->id_document_type;
        $person->id_number = $request->document_number;
        $person->names = $request->names;
        $person->last_name = $request->last_name;
        $person->middle_name = $request->middle_name;
        $person->born_date = $request->born_date;
        $person->born_city = $request->id_city;
        $person->email = $request->email;
        // Encrypting password
        $person->password = $this->passwordEncryptionService->encryptPassword($request->password);

        $person->save();
        $data_return = [
            'message'=> 'User created successfully!',
            'person'=> $person
        ];
        return response()->json($data_return);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $person_id)
    {
        $person = Person::find($person_id);
        if (!$person)
            return response()->json(['message' => 'User not found'], 404);
        return response()->json($person);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_person)
    {
        $person = Person::find($id_person);
        if (!$person)
            return response()->json(['message' => 'User not found'], 404); 

        $person->document_type = $request->id_document_type;
        $person->id_number = $request->document_number;
        $person->names = $request->names;
        $person->last_name = $request->last_name;
        $person->middle_name = $request->middle_name;
        $person->born_date = $request->born_date;
        $person->born_city = $request->id_city;
        $person->email = $request->email;
        $person->password = $request->password;
        $person->save();
        $data_return = [
            'message'=> 'User updated successfully!',
            'person'=> $person
        ];
        return response()->json($data_return);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $person_id)
    {
        $person = Person::find($person_id);

        if (!$person)
            return response()->json(['message' => 'User not found'], 404);

        $person->delete();
        $data_return = [
            'message'=> 'User deleted by soft delete.',
            'person'=> $person
        ];
        return response()->json($data_return);
    }

    public function filterPeople(Request $request)
    {
        $names = $request->input('names');
        $last_name = $request->input('last_name');
        $document_number = $request->input('document_number');
        $id_city = $request->input('id_city');

        $query = Person::query();

        if ($names)
            $query->where('names', 'LIKE', "%$names%");

        if ($last_name)
            $query->where('last_name', 'LIKE', "%$last_name%")
                  ->orWhere('middle_name', 'LIKE', "%$last_name%");

        if ($document_number)
            $query->where('id_number', 'LIKE', "%$document_number%");

        if ($id_city)
            $query->where('born_city', 'LIKE', "%$id_city%");

        $people = $query->get();

        return response()->json($people);
    }

}
