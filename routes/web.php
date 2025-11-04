
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    VentaController, InicioController, InicioclienteController,
    DashboardController, DashboardClienteController, UsuarioController,
    VehiculoController, NovedadController, NovedadclienteController,
    PrincipalController, RegisterController, RegisterclienteController
};
use App\Http\Middleware\{AdminMiddleware, ClienteMiddleware};

Route::middleware(['web'])->group(function () {

    // Página principal
    Route::get('/', [PrincipalController::class, 'index'])->name('principal');

    // LOGIN ADMIN
    Route::get('inicio', [InicioController::class, 'index'])->name('inicio.index');
    Route::post('inicio', [InicioController::class, 'login'])->name('inicio.login');
    Route::get('register', [RegisterController::class, 'showForm'])->name('register.showForm');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
    Route::post('/logout', [InicioController::class, 'logout'])->name('logout');

    // LOGIN CLIENTE
    Route::get('iniciocliente', [InicioclienteController::class, 'index'])->name('iniciocliente.index');
    Route::post('iniciocliente', [InicioclienteController::class, 'login'])->name('iniciocliente.login');
    Route::get('registercliente', [RegisterclienteController::class, 'showForm'])->name('registercliente.showForm');
    Route::post('registercliente', [RegisterclienteController::class, 'store'])->name('registercliente.store');
    Route::post('/logout-cliente', [InicioclienteController::class, 'logout'])->name('logoutcliente');

    // ADMIN
    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('ventas', VentaController::class)->except(['show']);
        Route::resource('vehiculo', VehiculoController::class)->except(['show']);
        Route::resource('usuario', UsuarioController::class)->except(['show']);
        Route::resource('novedad', NovedadController::class)->except(['show']);
<<<<<<< HEAD
        Route::post('/registrarventa', [VentaController::class, 'store'])->name('registrarventa.store');

=======
>>>>>>> 581e377bdac56f3a27ae114870c37facfb40b652
    });

    // CLIENTE
    Route::middleware([ClienteMiddleware::class])->group(function () {
        Route::get('dashboardcliente', [DashboardClienteController::class, 'index'])->name('dashboardcliente');
    });
});
