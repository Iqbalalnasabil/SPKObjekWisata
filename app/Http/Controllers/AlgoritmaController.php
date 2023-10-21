<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;

class AlgoritmaController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $alternatif = Alternatif::with('penilaian.crips')->get();
        $kriteria = Kriteria::with('crips')->orderBy('nama_kriteria', 'ASC')->get();
        $penilaian = Penilaian::with('crips','alternatif')->get();
        if (count($penilaian)==0) {
            return redirect(route('penilaian.index'));
        }
        //Mencari Min Max
        foreach($kriteria as $key =>$value){
            foreach($penilaian as $key_1 =>$value_1){
                if($value->id == $value_1->crips->kriteria_id){
                    if($value->atribut == 'Benefit'){
                        $minMax[$value->id] = $value_1->crips->bobot;
                    }elseif($value->atribut == 'Cost'){
                        $minMax[$value->id] = $value_1->crips->bobot;
                    }
                }
            }
        }

        //normalisasi
        foreach ($penilaian as $key_1 => $value_1) {
           foreach ($kriteria as $key => $value) {
                if ($value->id == $value_1->crips->kriteria_id){
                    if($value->atribut == 'Benefit'){
                        $normalisasi[$value_1->alternatif->nama_alternatif][$value->id] = $value_1->crips->bobot/($minMax[$value->id]);
                    }elseif ($value->atribut == 'Cost') {
                        $normalisasi[$value_1->alternatif->nama_alternatif][$value->id] = ($minMax[$value->id]) / $value_1->crips->bobot;
                    }
                }
            }
        }

        //Perangkingan
        foreach ($normalisasi as $key => $value) {
            foreach ($kriteria as $key_1 => $value_1) {
                $rank[$key][] = $value[$value_1->id] * $value_1->bobot;
            }
        }

        foreach ($normalisasi as $key => $value) {
            $normalisasi[$key][] = array_sum($rank[$key]);
        }
        arsort($normalisasi);;
        return view('admin.perhitungan.index', compact('alternatif', 'kriteria', 'normalisasi','rank'));
    }
}
