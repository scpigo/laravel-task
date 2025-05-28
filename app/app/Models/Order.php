<?php

namespace App\Models;

use App\Interfaces\Section;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

/**
 * @property int $id
 * @property string $buyer_fio
 * @property int $status
 * @property string $comment
 * @property int $good_id
 * @property int $good_quantity
 * @property float $price
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Order extends Model implements Section
{
    use HasFactory, AsSource;

    public const S_NEW = 0;
    public const S_FINISHED = 1;

    public const STATUSES = [
        self::S_NEW => 'Новый',
        self::S_FINISHED => 'Завершенный'
    ];

    protected $fillable = [
        'buyer_fio',
        'status',
        'comment',
        'good_id',
        'good_quantity',
        'price'
    ];

    public $timestamps = true;

    public static function getSectionName(): string
    {
        return 'Заказы';
    }

    public function good(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Good::class);
    }

    public function isNew(): bool
    {
        return $this->status == self::S_NEW;
    }

    public function setFinished(): bool
    {
        if ($this->status == self::S_FINISHED) return false;

        $this->status = self::S_FINISHED;

        return $this->saveOrFail();
    }
}
