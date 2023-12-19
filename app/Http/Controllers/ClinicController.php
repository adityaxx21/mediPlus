<?php
namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index()
    {
        $items = Clinic::all();
        return responses(200, $items, null);
    }

    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            return responses(403, null, null);
        }

        $item = Clinic::create($request->all());
        return responses(201, $item, null);
    }

    public function show($id)
    {
        $clinic = Clinic::find($id);
        return responses(200, $clinic, null);
    }

    public function update(Request $request, $id)
    {
        if (!auth()->user()->is_admin) {
            return responses(403, null, null);
        }

        $clinic = Clinic::find($id);
        if (empty($clinic)) {
            return responses(200, $clinic, null);
        }
        $clinic->update($request->all());
        return responses(200, $clinic, null);
    }

    public function destroy($id)
    {
        // if (!auth()->user()->is_admin) {
        //     return responses(403, null, null);
        // }

        $clinic = Clinic::find($id);

        if (empty($clinic)) {
            return responses(404, null, null);
        }

        $clinic->delete();
        return responses(204, null, null);
    }
}
