<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog = new \App\Blog();
        $blog->title = 'Van hoc';
        $blog->author = 'Thien Hoang';
        $blog->description = 'Co nhieu sach van hoc';
        $blog->save();

        $blog = new \App\Blog();
        $blog->title = 'Toan hoc';
        $blog->author = 'Hoang Thien';
        $blog->description = 'Co nhieu sach toan hoc';
        $blog->save();
    }
}
