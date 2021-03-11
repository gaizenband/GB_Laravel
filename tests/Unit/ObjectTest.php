<?php


namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\NewsOld;
use App\Models\Categories;

class ObjectTest extends TestCase
{
    public function testNews(){
        $news = new NewsOld();
        $this->assertIsObject($news);
    }
    public function testCategories(){
        $categories = new Categories();
        $this->assertIsObject($categories);
    }
    public function testSlug(){
        $categories = Categories::getCategoryIdBySlug('sport');
        $this->assertIsNumeric($categories);
    }
    public function testNewsArray(){
        $news = NewsOld::getNewsId(1);
        $this->assertIsArray($news);
    }
}
