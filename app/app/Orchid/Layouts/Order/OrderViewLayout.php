<?php

namespace App\Orchid\Layouts\Order;

use App\Models\Order;
use Orchid\Screen\Layouts\Legend;
use Orchid\Screen\Sight;

class OrderViewLayout extends Legend
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    protected $target = 'order';

    protected function columns(): iterable
    {
        return [
            Sight::make('id', 'ID'),

            Sight::make('buyer_fio', 'Имя покупателя'),

            Sight::make('status', 'Статус')->render(function (Order $order) {
                return Order::STATUSES[$order->status];
            }),

            Sight::make('comment', 'Комментарий'),

            Sight::make('good_id', 'Товар')->render(function (Order $order) {
                return $order->good->name;
            }),

            Sight::make('good_quantity', 'Количество'),

            Sight::make('price', 'Итоговая цена'),

            Sight::make('created_at', 'Создан')->render(function (Order $order) {
                return !is_null($order->created_at) ? $order->created_at->format('Y-m-d H:i') : '';
            }),

            Sight::make('updated_at', 'Последнее обновление')->render(function (Order $order) {
                return !is_null($order->updated_at) ? $order->updated_at->format('Y-m-d H:i') : '';
            }),
        ];
    }
}
