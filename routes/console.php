<?php

use Illuminate\Foundation\Inspiring;
use App\Http\Controllers\RouteController;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('add', function () {

    $dir = $this->ask('Path (from /var/www/)?');
    $branch = $this->ask('Branch?');
    $reset = $this->confirm('Hard Reset?', 1);

    $aRoute = RouteController::add([
        'dir' => $dir,
        'branch' => $branch,
        'reset' => $reset,
    ]);

    $this->line('Route');
    $this->line(url('deploy/' . $aRoute['id']));
    $this->line('Secret');
    $this->line($aRoute['secret']);
});
