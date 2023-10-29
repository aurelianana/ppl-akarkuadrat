<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AkarKuadrat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AkarKuadratController extends Controller
{
    public function index(){
        $akar = AkarKuadrat::orderByDesc('created_at')->get();
        return response()->json($akar);
    }
    public function hitungAkarKuadrat($number)
    {
        if ($number < 0) {
            return response()->json(['error' => 'Angka Tidak Boleh Negatif'], 400);
        }

        $result = sqrt($number);
        $execution_time = microtime(true) - LARAVEL_START;

        $akar = AkarKuadrat::create([
            'angka' => $number,
            'hasil' => $result,
            'execution_time' => $execution_time,
            'method' => 'api'
        ]);

        return response()->json($akar);
    }

    public function hitungAkarKuadratSqrt($number)
    {
        if ($number < 0) {
            return response()->json(['error' => 'Angka Tidak Boleh Negatif'], 400);
        }

        // call procedure hitung_akar_kuadrat
        $result = 0;
        $result = DB::statement('CALL hitung_akar_kuadrat(?, @result)', [$number]);
        $result = DB::select('SELECT @result as result')[0]->result;

        // save to database
        $execution_time = microtime(true) - LARAVEL_START;
        $akar = AkarKuadrat::create([
            'angka' => floatval($number),
            'hasil' => $result,
            'execution_time' => $execution_time,
            'method' => 'sql'
        ]);

        return response()->json($akar);
    }
}
