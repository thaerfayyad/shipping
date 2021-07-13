<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\MenuRepository;

class SidebarComposer
{
    /**
     * The user repository implementation.
     *
     * @var MenuRepository
     */
    protected $menu;

    /**
     * Create a new profile composer.
     *
     * @param  MenuRepository  $menu
     * @return void
     */
    public function __construct(MenuRepository $menu)
    {
        // Dependencies automatically resolved by service container...
        $this->menu = $menu;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $view->with('sidebar', $this->menu->get());
    }
}
