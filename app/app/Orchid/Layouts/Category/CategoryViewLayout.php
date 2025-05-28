<?php

namespace App\Orchid\Layouts\Category;

use App\Models\Category;
use Orchid\Screen\Layouts\Legend;
use Orchid\Screen\Sight;

class CategoryViewLayout extends Legend
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    protected $target = 'category';

    protected function columns(): iterable
    {
        return [
            Sight::make('id', 'ID'),

            Sight::make('name', 'Название'),

            Sight::make('created_at', 'Создан')->render(function (Category $category) {
                return !is_null($category->created_at) ? $category->created_at->format('Y-m-d H:i') : '';
            }),

            Sight::make('updated_at', 'Последнее обновление')->render(function (Category $category) {
                return !is_null($category->updated_at) ? $category->updated_at->format('Y-m-d H:i') : '';
            }),
        ];
    }
}
