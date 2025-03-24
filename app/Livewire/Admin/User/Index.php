<?php
namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $pages = 10;
    protected $paginationTheme = 'tailwind'; // O "bootstrap" si usas Bootstrap

    // Resetea la paginación cuando cambia el número de registros por página
    public function updatingPages()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::paginate($this->pages); // Usa la variable dinámica

        return view('livewire.admin.user.index', compact('users'));
    }
}