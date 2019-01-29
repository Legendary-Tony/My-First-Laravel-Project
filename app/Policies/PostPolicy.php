<?php

namespace App\Policies;


use App\Model\admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the Admin can view the post.
     *
     * @param  \App\Model\Admin\Admin  $Admin
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(Admin $Admin)
    {

    }

    /**
     * Determine whether the Admin can create posts.
     *
     * @param  \App\Model\Admin\Admin  $Admin
     * @return mixed
     */
    public function create(Admin $Admin)
    {
        return $this->getPermission($Admin, 2);
    }

    public function user(Admin $Admin)
    {
        return $this->getPermission($Admin, 5);
    }

    public function userEdit(Admin $Admin)
    {
        return $this->getPermission($Admin, 6);
    }

    public function userDelete(Admin $Admin)
    {
        return $this->getPermission($Admin, 7);
    }

    /**
     * Determine whether the Admin can update the post.
     *
     * @param  \App\Model\Admin\Admin  $Admin
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(Admin $Admin)
    {
        return $this->getPermission($Admin, 3);
    }

    /**
     * Determine whether the Admin can delete the post.
     *
     * @param  \App\Model\Admin\Admin  $Admin
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(Admin $Admin)
    {
        return $this->getPermission($Admin, 4);
    }

    public function tag(Admin $Admin)
    {
        return $this->getPermission($Admin, 8);
    }


    public function category(Admin $Admin)
    {
        return $this->getPermission($Admin, 9);
    }


    protected function getPermission($Admin, $p_id){
        foreach ($Admin->roles as $role) {
         foreach ($role->permissions as $permission) {
             if ($permission->id == $p_id) {
                 return true;
             }
         }
     }
     return false;
 }

    /**
     * Determine whether the Admin can restore the post.
     *
     * @param  \App\Model\Admin\Admin  $Admin
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(Admin $Admin)
    {
        //
    }

    /**
     * Determine whether the Admin can permanently delete the post.
     *
     * @param  \App\Model\Admin\Admin  $Admin
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(Admin $Admin)
    {
        //
    }
}
