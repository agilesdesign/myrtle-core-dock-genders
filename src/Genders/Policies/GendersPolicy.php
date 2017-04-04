<?php

namespace Myrtle\Core\Genders\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GendersPolicy
{
	use HandlesAuthorization;

	/**
	 * Create a new policy instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * @param User $user
	 * @return mixed
	 */
	public function admin(User $user)
	{
		return $user->allPermissions->contains(function ($ability, $key) {
			return $ability->name === 'genders.admin';
		});
	}

	public function seed(User $user)
	{
		return $user->allPermissions->contains(function ($ability, $key) use ($user) {
			return $this->admin($user) && $ability->name === 'genders.seed';
		});
	}
}
