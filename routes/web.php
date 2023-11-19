<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

    //middleware se ejecuta entre la solicitud y la respuesta, permite realizar acciones o validaciones antes de que una solicitud llegue a su destino final o despues de que se genere una respuesta.

    //middleware auth: verifica si el usuario esta autenticado (si a hecho login con anterioridad y tiene una sesion valida, si es asi le devuelve la vista dashboard pero sino esta entonces lo redirecciona a la vista login)

    //middleware verified: verifica si el usuario a verificado su cuenta de email, para asegurarnos de que el usaurio tiene un email verdadero o un email que recibe correo, esta verificacion se realiza enviando un email con el link de verificacion, al darle clic se setea el campo de email_verified(base de datos dbeaver con la fecha de verificacion)

    //En el codigo que teniamos en Route::get('/dashboard'), estabamos usando el auth y el verified, pero como no vamos a usar el verified porque esto es prueba y estamos iniciando entonces lo elimino y solo trabajo con el auth



// Route::get('/', function () {
//     return view('welcome');
//     });


// Route::get('/chirps', function () {
//         return 'Hola esta es la pagina chirps';
//     })->name('chirps.index');
    
    // Route::get('/dashboard', function () {
    //         return view('dashboard');
    //     })->middleware(['auth'])->name('dashboard');
        
        
//**SIMPILIFICAMOS** */
    Route::view('/','welcome')->name('welcome');


//paginas en la que se pueda ingresar solo con autenticacion.
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chirps', function () {
        //view.index(view es la carpeta, el punto significa 'entrar', index es el nombre de archivp)
        return view('/chirps.index');
    })->name('chirps.index');
});

    require __DIR__.'/auth.php';


