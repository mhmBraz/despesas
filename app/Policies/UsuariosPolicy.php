<?php

namespace App\Policies;

use App\Models\Usuarios\Usuarios;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuariosPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Usuarios\Usuarios  $usuarios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Usuarios $usuarios)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Usuarios\Usuarios  $usuarios
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Usuarios $usuarios, Usuarios $usuarios)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Usuarios\Usuarios  $usuarios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Usuarios $usuarios)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Usuarios\Usuarios  $usuarios
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Usuarios $usuarios, Usuarios $usuarios)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Usuarios\Usuarios  $usuarios
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Usuarios $usuarios, Usuarios $usuarios)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Usuarios\Usuarios  $usuarios
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Usuarios $usuarios, Usuarios $usuarios)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Usuarios\Usuarios  $usuarios
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Usuarios $usuarios, Usuarios $usuarios)
    {
        //
    }
}
