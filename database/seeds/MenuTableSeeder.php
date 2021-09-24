<?php

namespace Database\Seeders;

use App\Menu;
use App\Pages;
use App\MenuItem;
use App\Categories;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $main_menu = Menu::firstOrCreate([
            'name' => 'Main Menu',
            'slug' => 'main-menu',
            'location' => 'main-menu',
        ]);
        $mobile_menu = Menu::firstOrCreate([
            'name' => 'Mobile Menu',
            'slug' => 'mobile-menu',
            'location' => 'mobile-menu',
        ]);

        $mega_menu = Menu::firstOrCreate([
            'name' => 'Mega Menu',
            'slug' => 'mega-menu',
            'location' => 'mega-menu',
        ]);

        $footer_menu = Menu::firstOrCreate([
            'name' => 'Footer Menu',
            'slug' => 'footer-menu',
            'location' => 'footer-menu',
        ]);

        //main menu
        $cats = Categories::byMenu()->byActive()->byOrder()->limit(9)->get();
        foreach ($cats as $cat) {
            $this->addMenu([
                'menu_id' => $main_menu->id,
                'title' => $cat->name,
                'order' => $cat->order,
                'url' => '/' . $cat->name_slug,
                'icon' => $cat->menu_icon_show ? $cat->icon : null,
            ]);
            $this->addMenu([
                'menu_id' => $mobile_menu->id,
                'title' => $cat->name,
                'order' => $cat->order,
                'url' => '/' . $cat->name_slug,
                'icon' => $cat->icon,
            ]);
        }

        // mega menu
        $subcats = Categories::bySub()->byActive()->orderBy('name')->get();
        foreach ($subcats as $cat) {
            $this->addMenu([
                'menu_id' => $mega_menu->id,
                'title' => $cat->name,
                'order' => $cat->order,
                'url' => '/' . $cat->name_slug,
                'icon' => $cat->menu_icon_show ? $cat->icon : null,
            ]);
        }

        // footer menu
        $pages = Pages::where('footer', '1')->get();
        foreach ($pages as $order => $page) {
            $this->addMenu([
                'menu_id' => $footer_menu->id,
                'title' => $page->title,
                'order' => $order,
                'url' => '/pages/' . $page->slug,
            ]);
        }
    }

    private function addMenu($menu)
    {
        $only = Arr::only($menu, ['menu_id', 'title', 'url']);
        $rest = Arr::except($menu, ['menu_id', 'title', 'url']);

        $menuItem = MenuItem::firstOrNew($only);
        if ($menuItem && $rest) {
            $menuItem->save($rest);
        }
    }
}
