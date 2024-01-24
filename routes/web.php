<?php

use App\Http\Controllers\AdminTransaksiController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InfoTipsController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserBrandController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInfoTipsController;
use App\Http\Controllers\UserProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;


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

// user view

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/infotips', [UserInfoTipsController::class, 'index'])->name('infoTips');
Route::get('/infotips/{id}', [UserInfoTipsController::class, 'detail']);

//produk
Route::get('/produk', [UserProductController::class, 'index'])->name('user.product');
Route::get('/produk/{product:slug}', [UserProductController::class, 'spek']);

Route::get('/brand/{slug}', [UserBrandController::class, 'index'])->name('user.brand');
//kategori
Route::get('/kategori/{slug}', [UserCategoryController::class, 'index'])->name('user.cat');

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('tentang');

Route::get('/chart-data-bulanan',[DashboardController::class,'getData']);


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::put('/profile/updatepic', [ProfileController::class, 'updatePic'])->name('user.updatepic');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('user.updateprof');
    //logout
    Route::post('logout', LogoutController::class)->name('admin.logout');
});

Route::middleware(['has_no_role', 'auth'])->group(function () {
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
    Route::post('/keranjang', [KeranjangController::class, 'store'])->name('keranjang.add');
    Route::put('/keranjang/{id}/update', [KeranjangController::class, 'update'])->name('keranjang.update');
    Route::delete('/keranjang/delete/{id}', [KeranjangController::class, 'delete'])->name('keranjang.delete');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::post('/transaksi/create-snap-token', [TransaksiController::class, 'bayar'])->name('checkout.create_snap_token');
    Route::get('/transaksi-detail',[TransaksiController::class,'detail'])->name('user.transaksi');
    //invoice
    Route::get('/invoice/{transaksi:id}', [TransaksiController::class, 'invoice']);
    Route::get('/transaksi/cekongkir', [TransaksiController::class, 'ongkir'])->name('cekongkir');
    Route::get('/get-kota/{id}', [TransaksiController::class, 'getKota']);
    Route::put('/transaksi/code',[TransaksiController::class,'updatecode']);
});

Route::middleware(['has_role', 'auth'])->prefix('/admin')->group(function () {
    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    //category
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/category', [CategoryController::class, 'create'])->name('category.create');
    Route::put('/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/{category:slug}', [CategoryController::class, 'show']);
    Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy']);

    // brand
    Route::get('/brand', [BrandController::class, 'index'])->name('admin.brand');
    Route::post('/brand', [BrandController::class, 'create'])->name('brand.create');
    Route::delete('/brand/delete/{id}', [BrandController::class, 'destroy']);
    Route::get('/brand/{brand:slug}', [BrandController::class, 'show']);
    Route::put('/brand/{id}/update', [BrandController::class, 'update'])->name('brand.update');

    // Product
    Route::get('/product', [ProductController::class, 'index'])->name('admin.product');
    Route::post('/product', [ProductController::class, 'store'])->name('product.create');
    Route::delete('/product/delete/{id}', [ProductController::class, 'destroy']);
    Route::get('/product/spek/{product:slug}', [ProductController::class, 'spek']);
    Route::get('/product/{product:slug}', [ProductController::class, 'show']);
    Route::put('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');

    //user
    Route::get('/user', [UserController::class, 'index'])->name('admin.user');
    Route::post('/user', [UserController::class, 'store'])->name('user.create');
    Route::get('/user/{user:id}', [UserController::class, 'show']);
    Route::put('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);

    //info tips
    Route::get('/infotips', [InfoTipsController::class, 'index'])->name('admin.info');
    Route::get('/infotips/getdata', [InfoTipsController::class, 'getData']);
    Route::post('/infotips', [InfoTipsController::class, 'store'])->name('info.create');
    Route::delete('/infotips/delete/{id}', [InfoTipsController::class, 'destroy']);
    Route::get('/infotips/{infotips:slug}', [InfoTipsController::class, 'show']);
    Route::put('/infotips/{id}/update', [InfoTipsController::class, 'update'])->name('info.update');

    //Transaksi
    Route::get('/transaksi',[AdminTransaksiController::class,'index'])->name('admin.transaksi');
    Route::get('/invoice/{transaksi:id}',[AdminTransaksiController::class,'invoice']);

    Route::get('/laporan',[LaporanController::class,'index'])->name('admin.laporan');
});

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
    $status = Password::sendResetLink(
        $request->only('email')
    );
    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => $password
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
