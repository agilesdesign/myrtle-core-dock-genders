<?php

namespace Myrtle\Core\Genders\Models\Traits;

use Myrtle\Genders\Models\Gender;

trait BelongsToGender
{
	public function gender()
	{
		return $this->belongsTo(Gender::class);
	}
}