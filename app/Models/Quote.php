<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Quote extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'editor_id', 'quote', 'author',
    ];

    /**
     * Редактор
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }

    /**
     * Выдержка цитаты
     * @return string
     */
    public function getExcerptAttribute()
    {
        return strip_tags(Str::words($this->quote, 10));
    }
}

