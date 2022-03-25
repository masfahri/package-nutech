<?php

namespace Masfahri\Nutech\Models;

use Masfahri\Nutech\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Items extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the Media associated with the Items
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Media()
    {
        return $this->hasOne(Media::class, 'item_id');
    }

}
