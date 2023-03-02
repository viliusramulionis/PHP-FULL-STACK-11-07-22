<?php
namespace Controllers;

use \Models\Videos;
use \Models\Categories;

class Homepage {
    public static function index() {
        $videos = new Videos();
        $videos = $videos->getRecords();

        $categories = new Categories();
        $categories = $categories->getRecords();

        include 'views/home.php';
    }

    public static function byCategory($id) {
        $videos = new Videos();
        $videos = $videos->categoryVideos($id);

        $categories = new Categories();
        $categories = $categories->getRecords();

        include 'views/home.php';
    }
}