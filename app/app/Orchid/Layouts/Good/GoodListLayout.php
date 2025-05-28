<?php

namespace App\Orchid\Layouts\Good;

use App\Models\Good;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class GoodListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'goods';

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
                ->render(function (Good $good) {
                    return Link::make($good->name)
                        ->route('platform.goods.view', $good);
                })
                ->cantHide(),

            TD::make('description', 'Описание')->cantHide(),

            TD::make('category_id', 'Категория')
                ->render(function (Good $good) {
                    return $good->category->name;
                })
                ->cantHide(),

            TD::make('price', 'цена')->cantHide(),

            TD::make(__('Actions'))
                ->cantHide()
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Good $good) {
                    return DropDown::make()
                        ->icon('three-dots-vertical')
                        ->list([

                            Link::make('Просмотреть')
                                ->route('platform.goods.view', $good)
                                ->icon('eye'),

                            Link::make(__('Edit'))
                                ->route('platform.goods.edit', $good)
                                ->icon('pencil'),
                        ]);
                }),
        ];
    }
}
