<?php

namespace App\Orchid\Screens\Order;

use App\Models\Order;
use App\Orchid\Layouts\Order\OrderViewLayout;
use Illuminate\Http\RedirectResponse;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class OrderViewScreen extends Screen
{
    public $order;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Order $order): iterable
    {
        return [
            'order' => $order,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Просмотр заказа';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Пометить завершенным')
                ->method('setFinished')
                ->icon('exclamation')
                ->confirm('Вы уверены, что хотите пометить заказ выполненным?')
                ->canSee($this->order->isNew()),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            OrderViewLayout::class,
        ];
    }

    /**
     * Отметить заказ завершенным
     *
     * @param Order $order
     * @return RedirectResponse
     */
    public function setFinished(Order $order)
    {
        $result = $order->setFinished();

        Alert::info($result ? 'Заказ выполнен!' : 'Что-то пошло не так: ' . $result);

        return redirect()->route('platform.orders.view', $order);
    }
}
