<?php

namespace App\Http\Controllers;

use App\Models\ProfessionModel;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    public function index()
    {
        $listprofession = ProfessionModel::all();
        return view('admin.profession', ['listprofession' => $listprofession]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'profession'    =>  'required',
            'status'        =>  'required',
        ]);

        ProfessionModel::create([
            'profession'    => $request->profession,
            'status'        => $request->status
        ]);

        return redirect('profession')->with('success', 'Data Success Disimpan !');
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'profession'    =>  'required',
            'status'        =>  'required',
        ]);

        ProfessionModel::where('id', $id)
            ->update([
                'profession'   => $request->profession,
                'status'       => $request->status
            ]);

        return redirect('profession')->with('success', 'Data Success Diupdate !');
    }

    public function delete($id)
    {
        ProfessionModel::where('id', $id)
            ->delete();

        return redirect('profession')->with('success', 'Data Success Diahpus !');
    }
}
