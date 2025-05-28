<?php

namespace App\Orchid\Screens\Good;

use App\Models\Good;
use App\Orchid\Layouts\Good\GoodViewLayout;
use Orchid\Screen\Screen;

class GoodViewScreen extends Screen
{
    public $good;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Good $good): iterable
    {
        return [
            'good' => $good,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Просмотр товара';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            GoodViewLayout::class,
        ];
    }
}
