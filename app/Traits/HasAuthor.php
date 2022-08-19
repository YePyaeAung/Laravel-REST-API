<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use phpDocumentor\Reflection\Types\This;

trait HasAuthor {
    public function author() : User
    {
        return $this->authorRelationships();
    }

    public function authorRelationships() : BelongsTo
    {
        return $this->belongsTo( User::class, 'author_id');
    }
    public function isAuthoredBy(User $user) : bool
    {
        return $this->author()->matches($user);
    }
    public function authoredBy(User $author)
    {
        return $this->authorRelationships()->associate($author);
    }
}