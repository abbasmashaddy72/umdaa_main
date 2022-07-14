<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Jenssegers\Agent\Agent;

class AppLayout extends Component
{
    public $side_menu;

    public $agent;

    public function __construct()
    {
        $this->agent = new Agent();
        $this->side_menu = [
            'dashboard' => [
                'icon' => 'home',
                'title' => 'Dashboard',
                'route_name' => 'dashboard',
            ],
            'devider',
            'crud' => [
                'icon' => 'edit',
                'title' => 'CRUD',
                'route_name' => 'crud.index',
            ],
            'users' => [
                'icon' => 'users',
                'title' => 'Users',
                'route_name' => 'user.index',
            ]
        ];

        view()->share('side_menu', $this->side_menu);
        $pageName = request()->route()->getName();
        $activeMenu = $this->activeMenu($pageName);
        view()->share('first_level_active_index', $activeMenu['first_level_active_index']);
        view()->share('second_level_active_index', $activeMenu['second_level_active_index']);
        view()->share('third_level_active_index', $activeMenu['third_level_active_index']);
    }

    /**
     * Determine active menu & submenu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function activeMenu($pageName)
    {
        $firstLevelActiveIndex = '';
        $secondLevelActiveIndex = '';
        $thirdLevelActiveIndex = '';

        foreach ($this->side_menu as $menuKey => $menu) {
            if ($menu !== 'devider' && isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
                $firstLevelActiveIndex = $menuKey;
            }

            if (isset($menu['sub_menu'])) {

                foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {

                    if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                        $firstLevelActiveIndex = $menuKey;
                        $secondLevelActiveIndex = $subMenuKey;
                    }

                    if (isset($subMenu['sub_menu'])) {

                        foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {

                            if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                                $firstLevelActiveIndex = $menuKey;
                                $secondLevelActiveIndex = $subMenuKey;
                                $thirdLevelActiveIndex = $lastSubMenuKey;
                            }
                        }
                    }
                }
            }
        }

        return [
            'first_level_active_index' => $firstLevelActiveIndex,
            'second_level_active_index' => $secondLevelActiveIndex,
            'third_level_active_index' => $thirdLevelActiveIndex
        ];
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
