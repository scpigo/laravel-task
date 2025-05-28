<?php

namespace App\Orchid\Screens\Good;

use App\Models\Good;
use App\Orchid\Layouts\Good\GoodEditLayout;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class GoodEditScreen extends Screen
{
    public $good;

    /**
     * Query data.
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
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->good->exists ? 'Редактировать' : 'Добавить';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Создать')
                ->icon('plus')
                ->method('createOrUpdate')
                ->canSee(!$this->good->exists),

            Button::make('Обновить')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->good->exists),

            Button::make('Удалить')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->good->exists),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            GoodEditLayout::class,
        ];
    }

    /**
     * @param Good $good
     * @param Request $request
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function createOrUpdate(Good $good, Request $request): RedirectResponse
    {
        $good->fill($request->get('good'));

        $good->save();

        Alert::info('Запись сохранена.');

        return redirect()->route('platform.goods.edit', $good);
    }

    /**
     * @param Good $good
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function remove(Good $good): RedirectResponse
    {
        $good->delete();

        Alert::info('Запись удалена.');

        return redirect()->route('platform.goods');
    }
}
