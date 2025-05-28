<?php

namespace App\Orchid\Layouts\Good;

use App\Models\Category;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class GoodEditLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            Input::make('good.name')
                ->title('Название товара')
                ->required(),

            TextArea::make('good.description')
                ->title('Описание товара')
                ->rows(5),

            Select::make('good.category_id')
                ->title('Категория')
                ->fromModel(Category::class, 'name')
                ->required(),

            Input::make('good.price')
                ->type('number')
                ->min(0)
                ->step(0.01)
                ->title('Цена')
                ->required(),
            ];
    }
}
