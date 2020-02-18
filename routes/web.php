<?php

use App\LuckyDraw;
use App\Staff;
use Illuminate\Database\Eloquent\ModelNotFoundException;

Route::get('test', function(){
    $data = [
        1 => 'asdfasf',
        4 => 'ok'
    ];
    dd($data[1]);
});

Route::get('/', function () {
    if (!session()->has('lucky_draw_number')) {
        // session(['lucky_draw_number' => 18]);
        session(['lucky_draw_number' => 20]);
    }

    $lucky_draw_item = LuckyDraw::whereSpecialNumber( session('lucky_draw_number') )->firstOrFail();
    
    return view('winner', compact('lucky_draw_item'));
})->middleware('auth', 'completed');

Route::get('/next', function(){
    session(['lucky_draw_number' => session('lucky_draw_number') - 1]);
    return redirect('/');
})->middleware('auth', 'completed');

Route::get('other-prices', function(){
    // services
    LuckyDraw::whereNull('special_number')
        ->whereNull('staff_id')
        ->whereTypeId(1)
        ->get()
        ->each(function($e){
            $winner = Staff::whereTypeId(1)->whereAlreadyWinner(false)->inRandomOrder()->first();
            $winner->already_winner = true;
            $winner->save();

            $e->staff_id = $winner->id;
            $e->save();
        });

    // normal
    LuckyDraw::whereNull('special_number')
        ->whereNull('staff_id')
        ->whereTypeId(2)
        ->get()
        ->each(function($e){
            $winner = Staff::whereTypeId(2)->whereAlreadyWinner(false)->inRandomOrder()->first();
            $winner->already_winner = true;
            $winner->save();

            $e->staff_id = $winner->id;
            $e->save();
        });

    LuckyDraw::whereNull('special_number')
        ->whereNull('staff_id')
        ->whereTypeId(3)
        ->get()
        ->each(function($e){
            $winner = Staff::whereTypeId(3)->whereAlreadyWinner(false)->inRandomOrder()->first();
            $winner->already_winner = true;
            $winner->save();

            $e->staff_id = $winner->id;
            $e->save();
        });    

    return redirect('done');
})->middleware('auth', 'completed');

Route::get('winner-is', function(){
    try {
        $winner = Staff::whereTypeId(1)->whereAlreadyWinner(false)->inRandomOrder()->firstOrFail();
        $winner->already_winner = true;
        $winner->save();

        $lucky_draw_item = LuckyDraw::whereSpecialNumber( session('lucky_draw_number') )->firstOrFail();
        $lucky_draw_item->staff_id = $winner->id;
        $lucky_draw_item->save();

        return view('winner', compact('winner', 'lucky_draw_item'));
    } catch (ModelNotFoundException $e) {
        return redirect('/done');
    }
})->middleware('auth', 'completed');

Route::get('/reset', function(){
    session()->forget('lucky_draw_number');
    session()->forget('lucky_draw_done');
    Staff::whereAlreadyWinner(true)->get()->each(function($e){
        $e->reset_winner();
    });
    LuckyDraw::whereNotNull('staff_id')->get()->each(function($e){
        $e->staff_id = null;
        $e->save();
    });
    return redirect('/');
})->middleware('auth');

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('winners', function(){
    $lucky_draws = LuckyDraw::with('staff')->whereNotNull('staff_id')->orderBy('updated_at', 'desc')->get();
    return view('winners', compact('lucky_draws'));
});

Route::get('done', function(){
    session(['lucky_draw_done' => true]);
    return view('done');
});
