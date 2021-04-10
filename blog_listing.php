<?php
require_once("common.php");

$allBlogs = getBlog(null);
    // echo "<pre>";
    // print_r($allBlogs);
    // echo "</pre>";exit;


require_once("content/blog_listing.html.php");
