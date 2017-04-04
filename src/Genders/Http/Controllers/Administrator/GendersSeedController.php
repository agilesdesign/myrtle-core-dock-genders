<?php

namespace Myrtle\Core\Genders\Http\Controllers\Administrator;

use Genders\Models\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class GendersSeedController extends Controller
{
    public function create()
    {
        $this->authorize('seed', Gender::class);

        $genders = \GendersTableSeeder::genders();

        return view('admin::docks.genders.seed.create')->withGenders($genders);
    }

    public function store(Request $form)
    {
        $this->authorize('seed', Gender::class);

        Artisan::call('db:seed', ['--class' => \GendersTableSeeder::class]);

        flasher()->alert('Genders seeded successfully', 'success');

        return redirect(route('admin.genders.index'));
    }
}
