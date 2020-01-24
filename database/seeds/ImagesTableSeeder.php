<?php

use Illuminate\Database\Seeder;
use App\Image;
class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'title' => 'Сан-Франциско', 'alt' => 'San Francisco', 'published' => '1', 'url' => 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/san-fransisco-768x432.jpg'],
            ['id' => 2, 'title' => 'Лондон', 'alt' => 'London', 'published' => '1', 'url' => 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/london-768x432.jpg'],
            ['id' => 3, 'title' => 'Нью-Йорк', 'alt' => 'New York', 'published' => '1', 'url' => 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/new-york-768x432.jpg'],
            ['id' => 4, 'title' => 'Кейптаун', 'alt' => 'Cape Town', 'published' => '1', 'url' => 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/cape-town-768x432.jpg'],
            ['id' => 5, 'title' => 'Пекин', 'alt' => 'Beijing', 'published' => '1', 'url'  => 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/beijing-768x432.jpg'],
            ['id' => 6, 'title' => 'Париж', 'alt' => 'Paris', 'published' => '0', 'url' => 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/paris-768x432.jpg'],
        ];

        foreach ($items as $item) {
            Image::create($item);
        }
    }
}
