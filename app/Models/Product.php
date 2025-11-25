<?php

namespace App\Models;

//si
//que sigue
// le preguntare a la ia .-.
// men tengo 25 en lab de redes rico mano el inge vera mi nota y se va a poner orgulloso de mi
//igual a mi
// a mi aun no me sube la nota, kue le habre hecho, se habra dado cuenta que ers mi cuategi
//estoy viendo que haces en terminal , si cjdo? si mano, mi terminal no devuelve nada, por kue sera 
//
//usaste php artisan migrate?
// of course .-.
//vuelve a correr php artisan migrate, pera, ia laburando...
//ok, checa las vistas 
//ya vi 
//no falta la de eliminar
//men no veo nada que sale
//solo veo que urgas en el navegador of course .-. , pasa cap de como se ve .-.-.-.-.-.-.-.-.
// mmm solo veo la terminal que urgas
// no veo nada en el navegador
/* me dijo esto:
Tarea 1: Controladores Crea los siguientes controladores en app/Http/Controllers para las entidades Categoria y Lote (Batch). Deben seguir EXACTAMENTE la estructura de PersonasController:

CategoriaController:

index(): Trae todas las categorías (Categoria::all()), mételas en ['cats' => $categorias] y retorna view('categoria.index', $datos).

create(): Retorna view('categoria.create').

save(Request $request): Crea usando $request->all() y redirige a /categoria.

edit($id): Busca con findOrFail, mete en ['cat' => $categoria] y retorna view('categoria.edit', $datos).

update(Request $request, $id): Actualiza y redirige.

destroy($id): Elimina y redirige.

LoteController (Batch):

Misma lógica. Usa ['lotes' => $lotes] para el index.

Tarea 2: Rutas Edita routes/web.php. Agrega las rutas manuales para CategoriaController y LoteController siguiendo el patrón del docente:

Route::get('/categoria', ...)->name('categoria.index');

Route::get('/categoria/create', ...)->name('categoria.create');

Route::post('/categoria', ...)->name('categoria.save');

Route::get('/categoria/{id}/edit', ...)->name('categoria.edit');

Route::put('/categoria/{id}', ...)->name('categoria.update');

Route::delete('/categoria/{id}', ...)->name('categoria.destroy');

Repite lo mismo para /lote.

Restricción: NO uses Route::resource. Usa Request $request explícito en los métodos.

*/
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'image_path',
        'min_stock_alert',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }

    /**
     * Get the category that owns the product.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the batches for the product.
     */
    public function batches(): HasMany
    {
        return $this->hasMany(Batch::class);
    }
}
