<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $html = new Category();
        $html->name = 'HTML';
        $html->slug = 'html';
        $html->save();

        $css = new Category();
        $css->name = 'CSS';
        $css->slug = 'css';
        $css->save();

        $js = new Category();
        $js->name = 'JS';
        $js->slug = 'js';
        $js->save();

        $php = new Category();
        $php->name = 'PHP';
        $php->slug = 'php';
        $php->save();
    }
}
