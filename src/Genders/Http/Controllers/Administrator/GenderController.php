<?php

namespace Myrtle\Core\Genders\Http\Controllers\Administrator;

use Myrtle\Genders\Models\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenderController extends Controller
{
    public function index()
    {
        $genders = Gender::orderBy('name')->paginate();

        return view('admin::genders.index')->withGenders($genders);
    }

    public function create(Gender $gender)
    {
        return view('admin::genders.create', ['gender' => $gender]);
    }

    public function store(Request $request, Gender $gender)
    {
        $gender->create($request->toArray());

        flasher()->alert('Gender added successfully', 'success');

        return redirect(route('admin.genders.index'));
    }

    public function edit(Gender $gender)
    {
        return view('admin::genders.edit')->withGender($gender);
    }

    public function update(Request $request, Gender $gender)
    {
        $gender->update($request->toArray());

        flasher()->alert('Gender updated successfully', 'success');

        return redirect(route('admin.genders.index'));
    }

    public function destroy(Request $request, Gender $gender)
    {
        $this->authorize('delete', $gender);

        $gender->delete();

        flasher()->alert('Gender removed successfully', 'success');

        return redirect(route('admin.genders.index'));
    }
}
