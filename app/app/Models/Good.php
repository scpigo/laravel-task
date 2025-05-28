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
 * @property int $description
 * @property string $category_id
 * @property int $price
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Good extends Model implements Section
{
    use HasFactory, AsSource;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
    ];

    protected $appends = [
        'category_name'
    ];

    public $timestamps = true;

    public static function getSectionName(): string
    {
        return 'Товары';
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }

    public static function getGoodsForList()
    {
        return self::all()->mapWithKeys(function ($item) {
            return [
                $item->id => $item->name . " (". $item->category_name .")"
            ];
        })->toArray();
    }
}
