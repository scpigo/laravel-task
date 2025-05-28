<?php

namespace App\Orchid\Layouts\Good;

use App\Models\Good;
use Orchid\Screen\Layouts\Legend;
use Orchid\Screen\Sight;

class GoodViewLayout extends Legend
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    protected $target = 'good';

    protected function columns(): iterable
    {
        return [
            Sight::make('id', 'ID'),

            Sight::make('name', 'Название'),

            Sight::make('description', 'Описание'),

            Sight::make('category_id', 'Категория')->render(function (Good $good) {
                return $good->category->name;
            }),

            Sight::make('price', 'Цена'),

            Sight::make('created_at', 'Создан')->render(function (Good $good) {
                return !is_null($good->created_at) ? $good->created_at->format('Y-m-d H:i') : '';
            }),

            Sight::make('updated_at', 'Последнее обновление')->render(function (Good $good) {
                return !is_null($good->updated_at) ? $good->updated_at->format('Y-m-d H:i') : '';
            }),
        ];
    }
}
