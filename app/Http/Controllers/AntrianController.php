<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AntrianController extends Controller
{
    public function index()
    {
        $items = Antrian::all();
        return responses(200, $items, null);
    }

    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            return responses(403, null, null);
        }

        $item = Antrian::create($request->all());
        return responses(201, $item, null);
    }

    public function show(Antrian $antrian)
    {
        return responses(200, $antrian, null);
    }


    public function update(Request $request, Antrian $antrian)
    {
        if (!auth()->user()->is_admin) {
            return responses(403, null, null);
        }

        if (empty($antrian)) {
            return responses(404, $antrian, null);
        }

        $antrian->update($request->all());
        return responses(200, $antrian, null);
    }

    public function destroy($id)
    {
        if (!auth()->user()->is_admin) {
            return responses(403, null, null);
        }

        $antrian = Antrian::find($id);

        if (empty($antrian)) {
            return responses(404, null, null);
        }

        $antrian->delete();
        return responses(204, null, null);
    }

    public function createBooking(Request $request)
    {
        if (!auth()->user()->is_user) {
            return responses(403, null, null);
        }

        $antrian = DB::table('antrian_user')->insert([
            'user_id' => auth()->user()->id,
            'antrian_id' => $request->antrian_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return responses(201, $antrian, null);

    }

    public function antrianClinic($idClinic)
    {
        $antrians = Antrian::where('clinic_id', $idClinic)->get();
        return responses(200, $antrians, null);
    }

    public function antrianUser($idClinic, $idUser)
    {
        $antrian = Antrian::where('id', $idClinic)->first();

        if ($antrian) {
            $items = $antrian->antrianUser($idUser);
        } else {
            return responses(200, array(), null);
        }
        return responses(200, $items, null);
    }
}
