<?php

namespace App\Orchid\Screens\Category;

use App\Models\Category;
use App\Models\Good;
use App\Orchid\Layouts\Category\CategoryViewLayout;
use Orchid\Screen\Screen;

class CategoryViewScreen extends Screen
{

    public $category;

    /**
     * Fetch data to be displayed on the screen.
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
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Просмотр категории';
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
            CategoryViewLayout::class,
        ];
    }
}
