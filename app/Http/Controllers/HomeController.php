<?php

namespace App\Http\Controllers;

use App\Models\SoalTes;
use App\Models\MbtiInterprestation as mbtiinterpres;
use App\Models\MbtiCharacteristics as mbticharacter;
use App\Models\MbtiDevelopmentSuggestion as mbtidevelopment;
use App\Models\MbtiCarrierSuggestion as mbticarrier;
use App\Models\TesMBTI;
use App\Models\HasilTesMBTI;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function tes()
    {
        $soal_tes = SoalTes::all();
        return view('home.tes')->with(['soal_tes' => $soal_tes]);
    }

    public function cekToken(Request $request)
    {
        $token = $request->token;
        $tes = TesMBTI::where('token', $id)->first();

        return response()->json($tes);
    }

    private function penilaianTes($soal)
    {   $I=0;$E=0;$S=0;$N=0;$T=0;$F=0;$J=0;$P=0;
        for($no=1;$no<=60;$no++){
            $cek = $soal[$no];
            if($cek === 'I'){$I++;}
            if($cek === 'E'){$E++;}
            if($cek === 'S'){$S++;}
            if($cek === 'N'){$N++;}
            if($cek === 'T'){$T++;}
            if($cek === 'F'){$F++;}
            if($cek === 'J'){$J++;}
            if($cek === 'P'){$P++;}
        }
        $result = [
           'I' => round(($I=$I/15)*100),
           'E' => round(($E=$E/15)*100),
           'S' => round(($S=$S/15)*100),
           'N' => round(($N=$N/15)*100),
           'T' => round(($T=$T/15)*100),
           'F' => round(($F=$F/15)*100),
           'J' => round(($J=$J/15)*100),
           'P' => round(($P=$P/15)*100)
        ];
        $resultStr=($I>$E?'I':'E').($S>$N?'S':'N').($T>$F?'T':'F').($J>$P?'J':'P');
        $mbtiData = MbtiInterpres::where('personality', $resultStr)->first();
        return ['resultStr' => $resultStr, 'result' => $result, 'mbtiData' => $mbtiData];
    }

    public function hasilTes(Request $request)
    {
        $soal = $request->soal;
        $token = $request->token;

        $hasil = $this->penilaianTes($soal);

        if($token != NULL){
            $idTes = TesMBTI::where('token', $token)->first();
            $dataTes = $hasil['result'];
            $saveHasilTes = HasilTesMBTI::create([
                'id_tes' => $idTes->id,
                'nama_peserta_tes' => $request->nama_peserta_tes,
                'personality' => $hasil['resultStr'],
                'I' => $dataTes['I'],
                'E' => $dataTes['E'],
                'S' => $dataTes['S'],
                'N' => $dataTes['N'],
                'T' => $dataTes['T'],
                'F' => $dataTes['F'],
                'J' => $dataTes['J'],
                'P' => $dataTes['P'],
            ]);
        }
        // // $mbtiChar = mbticharacter::where('id_mbti', $idPersonality['id'])->get();
        // dd($hasil['mbtiData']);
        // // $mbtiDev = mbtidevelopment::where('id_mbti', $idPersonality[0])->get();
        // // $mbtiCarrier = mbticarrier::where('id_mbti', $idPersonality[0])->get();
        return view('home.hasil')
            ->with([
                'hasil' => $hasil['resultStr'],
                'indeksMBTI' => $hasil['result'],
                'mbtiData' => $hasil['mbtiData'] ,
                // 'mbtiChar' => $mbtiChar,
                // 'mbtiDev' => $mbtiDev,
                // 'mbtiCarrier' => $mbtiCarrier
            ]
        );
    }
}
