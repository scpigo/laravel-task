<?php

namespace App\Orchid\Layouts\Order;

use App\Models\Good;
use App\Models\Order;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class OrderListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'orders';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->width('32px'),

            TD::make('buyer_fio', 'Имя покупателя')
                ->render(function (Order $order) {
                    return Link::make($order->buyer_fio)
                        ->route('platform.orders.view', $order);
                })
                ->cantHide(),

            TD::make('status', 'Статус')
                ->render(function (Order $order) {
                    return Order::STATUSES[$order->status];
                })
                ->cantHide(),

            TD::make('comment', 'Комментарий'),

            TD::make('good_id', 'Товар')
                ->render(function (Order $order) {
                    return $order->good->name;
                })
                ->cantHide(),

            TD::make('good_quantity', 'Количество')->sort(),

            TD::make('price', 'Итоговая цена'),

            TD::make(__('Actions'))
                ->cantHide()
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Order $order) {
                    return DropDown::make()
                        ->icon('three-dots-vertical')
                        ->list([
                            Link::make('Просмотреть')
                                ->route('platform.orders.view', $order)
                                ->icon('eye'),
                        ]);
                }),
        ];
    }
}
