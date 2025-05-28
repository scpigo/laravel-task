<?php

namespace App\Orchid\Layouts\Category;

use App\Models\Category;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CategoryListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'categories';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->width('32px'),

            TD::make('name', 'Название')
                ->render(function (Category $category) {
                    return Link::make($category->name)
                        ->route('platform.categories.view', $category);
                })
                ->cantHide(),

            TD::make(__('Actions'))
                ->cantHide()
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Category $category) {
                    return DropDown::make()
                        ->icon('three-dots-vertical')
                        ->list([
                            Link::make('Просмотреть')
                                ->route('platform.categories.view', $category)
                                ->icon('eye'),
                            Link::make(__('Edit'))
                                ->route('platform.categories.edit', $category)
                                ->icon('pencil'),
                        ]);
                }),
        ];
    }
}
