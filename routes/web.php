<?php

use App\Models\AkarKuadrat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // check if not auth redirect to login
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    return view('index');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/total-kirim', function () {
    // query to get count of column angka from table akar_kuadrat
    $jumlah = DB::table('akar_kuadrats')
        ->select(DB::raw('angka, count(*) as jumlah'))
        ->groupBy('angka')
        ->orderBy('jumlah', 'desc')
        ->get();
    $fastest = AkarKuadrat::select('execution_time')
        ->orderBy('execution_time', 'asc')
        ->first();
    $slowest = AkarKuadrat::select('execution_time')
        ->orderBy('execution_time', 'desc')
        ->first();
    $total = AkarKuadrat::count();
    return view('total-kirim', compact('jumlah', 'fastest', 'slowest', 'total'));
});
