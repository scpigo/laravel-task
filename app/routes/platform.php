<?php

declare(strict_types=1);

use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;
use App\Models\Category;
use App\Orchid\Screens\Category\CategoryListScreen;
use App\Orchid\Screens\Category\CategoryViewScreen;
use App\Orchid\Screens\Category\CategoryEditScreen;
use App\Models\Good;
use App\Orchid\Screens\Good\GoodListScreen;
use App\Orchid\Screens\Good\GoodViewScreen;
use App\Orchid\Screens\Good\GoodEditScreen;
use App\Models\Order;
use App\Orchid\Screens\Order\OrderListScreen;
use App\Orchid\Screens\Order\OrderViewScreen;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// Categories

Route::screen('categories', CategoryListScreen::class)
    ->name('platform.categories')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(Category::getSectionName(), route('platform.categories'));
    });

Route::screen('categories/create', CategoryEditScreen::class)
    ->name('platform.categories.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.categories')
            ->push('Добавить', route('platform.categories.create'));
    });

Route::screen('categories/{category}/edit', CategoryEditScreen::class)
    ->name('platform.categories.edit')
    ->breadcrumbs(function (Trail $trail, Category $category) {
        return $trail
            ->parent('platform.categories')
            ->push('Редактировать', route('platform.categories.edit', $category));
    });

Route::screen('categories/{category}/view', CategoryViewScreen::class)
    ->name('platform.categories.view')
    ->breadcrumbs(function (Trail $trail, Category $category) {
        return $trail
            ->parent('platform.categories')
            ->push('Просмотр', route('platform.categories.view', $category));
    });

// Goods

Route::screen('goods', GoodListScreen::class)
    ->name('platform.goods')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(Good::getSectionName(), route('platform.goods'));
    });

Route::screen('goods/create', GoodEditScreen::class)
    ->name('platform.goods.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.goods')
            ->push('Добавить', route('platform.goods.create'));
    });

Route::screen('goods/{good}/edit', GoodEditScreen::class)
    ->name('platform.goods.edit')
    ->breadcrumbs(function (Trail $trail, Good $good) {
        return $trail
            ->parent('platform.goods')
            ->push('Редактировать', route('platform.goods.edit', $good));
    });

Route::screen('goods/{good}/view', GoodViewScreen::class)
    ->name('platform.goods.view')
    ->breadcrumbs(function (Trail $trail, Good $good) {
        return $trail
            ->parent('platform.goods')
            ->push('Просмотр', route('platform.goods.view', $good));
    });

// Orders

Route::screen('orders', OrderListScreen::class)
    ->name('platform.orders')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(Order::getSectionName(), route('platform.orders'));
    });

Route::screen('orders/{order}/view', OrderViewScreen::class)
    ->name('platform.orders.view')
    ->breadcrumbs(function (Trail $trail, Order $order) {
        return $trail
            ->parent('platform.orders')
            ->push('Просмотр', route('platform.orders.view', $order));
    });
