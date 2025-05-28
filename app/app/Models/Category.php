<?php

namespace App\Models;

use App\Interfaces\Section;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

/**
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Category extends Model implements Section
{
    use HasFactory, AsSource;

    protected $fillable = [
        'name'
    ];

    public $timestamps = true;

    public static function getSectionName(): string
    {
        return 'Категории';
    }

    public function goods(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Good::class);
    }
}
