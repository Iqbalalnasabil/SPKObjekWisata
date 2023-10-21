<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crips;
use App\Models\Kriteria;

class CripsController extends Controller
{
     public function store(Request $request)
     {
        $this->validate($request,[
            'kriteria_id' => 'required|string',
            'nama_crips' => 'required|string',
            'bobot' => 'required|numeric',
        ]);

        try {
            $crips = new Crips();
            $crips->kriteria_id = $request->kriteria_id;
            $crips->nama_crips = $request->nama_crips;
            $crips->bobot = $request->bobot;
            $crips->save();
            return back()->with('msg', 'Berhasil menambahkan data');
        } catch (Exception $e) {
            \log::emergency('file:', $e->getFile(). 'Line:' . $e->getLine(). 'Message:'. $e->getMessage());
            die('Gagal');
        }
     }

    public function edit($id)
    {
        $data['crips'] = Crips::findOrFail($id);
        return view('admin.crips.edit', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $crips = Crips::findOrFail($id);
            $crips->update([
                
                'nama_crips' =>$request->nama_crips,
                'bobot' => $request->bobot,
            ]);
            return back()->with('msg','Berhasil merubah data');
        } catch (Exception $e) {
            \log::emergency('file:', $e->getFile(). 'Line:' . $e->getLine(). 'Message:'. $e->getMessage());
            die('Gagal');
        }
    }

    public function destroy($id)
    {
        try {
            $crips = Crips::findOrFail($id);
            $crips->delete();
            return back()->with('msg','Berhasil menghapus data');
        } catch (Exception $e) {
            \log::emergency('file:', $e->getFile(). 'Line:' . $e->getLine(). 'Message:'. $e->getMessage());
            die('Gagal');
        }
    }
}
