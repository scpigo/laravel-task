<?php

namespace App\Orchid\Screens\Category;

use App\Models\Category;
use App\Orchid\Layouts\Category\CategoryEditLayout;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class CategoryEditScreen extends Screen
{
    public $category;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Category $category): iterable
    {
        return [
            'category' => $category,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->category->exists ? 'Редактировать' : 'Добавить';
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
                ->canSee(!$this->category->exists),

            Button::make('Обновить')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->category->exists),

            Button::make('Удалить')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->category->exists),
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
            CategoryEditLayout::class,
        ];
    }

    /**
     * @param Category $category
     * @param Request $request
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function createOrUpdate(Category $category, Request $request): RedirectResponse
    {
        $category->fill($request->get('category'));

        $category->save();

        Alert::info('Запись сохранена.');

        return redirect()->route('platform.categories.edit', $category);
    }

    /**
     * @param Category $category
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function remove(Category $category): RedirectResponse
    {
        $category->delete();

        Alert::info('Запись удалена.');

        return redirect()->route('platform.categories');
    }
}
