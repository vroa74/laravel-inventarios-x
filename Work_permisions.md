#  configurando permisos en laravel permisions

## instalacion

### instalando

    composer require spatie/laravel-permission

### publicando los archivos.

    php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

###    para poder tener las relaciones en el model user hay que agragar :

    use Spatie\Permission\Traits\HasRoles;

    use HasRoles;

### creacion la semilla para los roles

    php artisan make:seeder RoleSeeder

### cuso de cotroladores para los elementos

        php artisan make:controller CoController --resource
        php artisan make:controller AgeController --resource
        php artisan make:controller CoController --resource

### datos de ai

Tomando en consideracion este metodo :::
public function index(Request $request)
{
$ages = Age::all();
return response()->json($ages);
}
::::
crea la vista  tomando en consideracion que  las migracion es y
modifica la funcion para que la vista tenga paginacion
::::
Schema::create('ages', function (Blueprint $table) {
$table->id();
$table->char('titulo',5)->nullable();//titulochar(5)DEFAULTNULL
$table->char('nombre',30)->nullable();//nombrechar(30)DEFAULTNULL
$table->char('apaterno',30)->nullable();//apaternochar(30)DEFAULTNULL
$table->char('amaterno',30)->nullable();//amaternochar(30)DEFAULTNULL
$table->char('cargo',30)->nullable();//cargochar(30)DEFAULTNULL
$table->char('deporg',60)->nullable();//deporgchar(60)DEFAULTNULL
$table->char('telefono',255)->nullable();//telefonochar(255)DEFAULTNULL
$table->char('email',255)->nullable();//emailchar(255)DEFAULTNULL
$table->text('dir')->nullable();//dirtext
$table->char('modifico',20)->nullable();
$table->timestamps();
});

### co componentes

Tomando en consideracion este metodo :::
public function create()
{
return view('cos.create');
}
:::
crea la vista  tomando en consideracion que la migracion con todos sus campos:
::::
Schema::create('cos', function (Blueprint $table) {
$table->id();
$table->string('legislatura',length:15)->nullable();
$table->date('fcap')->nullable();
$table->date('frec')->nullable();
$table->string('ncor',30)->nullable();
$table->string('tcor',30)->nullable();
$table->string('ccor',30)->nullable();
$table->date('fofi')->nullable();
$table->string('nofi',20)->nullable();
$table->integer('nhoj')->nullable();
$table->string('rem_nombre',70)->nullable();
$table->string('rem_cargo',50)->nullable();
$table->string('rem_deporg',60)->nullable();
$table->text('rem_dir')->nullable();
$table->text('des')->nullable();
$table->text('seguimiento')->nullable();
$table->string('tur_nom',70)->nullable();
$table->string('tur_cargo',50)->nullable();
$table->string('tur_deporg',60)->nullable();
$table->string('creo',60)->nullable();
$table->string('modifico',20)->nullable();
$table->string('reporte',20)->nullable();
$table->boolean('estatus')->default(false);
$table->timestamps();
});
###  para crear los seeders de usuaios hubi que hacer esto:

<p> en el archivo DatabaseSeeder.php </p>

use Illuminate\Support\Facades\Hash;
use App\Models\User;
<p> y se agrego el codigo </p>

User::factory(50)->create([
'password' => Hash::make('password123') // Contraseña encriptada para todos
]);


## publicar errores

php artisan vendor:publish --tag=laravel-errors

se publican en:  resources/views/errors/

para ejecutar los seeders sin borrar la db hay que ejecutar

    php artisan db:seed


### Crud de rutas

php artisan make:controller Admin\UserController -r


## Existe alguna plantilla similar a admin lte que se puede instalar en laravel que se base en tailwind y de preferencia que use flowbites gratuita
