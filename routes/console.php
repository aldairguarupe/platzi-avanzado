<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

//Schedule::command(\App\Console\Commands\SendEmailverficationCommand::class)
//    ->everyTwoMinutes();

Schedule::call(function (){
    echo 'Hola Mundo!!';
})
    // ->onOneServer() // Para que se ejecute en un único servidor
    // ->evenInMaintenanceMode() // Se ejecuta aunque la app esté en modo mantenimiento
    // ->withoutOverlapping() // Evita la superposición de tareas, evita que se ejecute si ya hay una instancia del mismo comando
    // ->sendOutputTo(storage_path('logs/mi_archivo.log')) //Guarda los logs en ese archivo
    ->everyTwoMinutes();
