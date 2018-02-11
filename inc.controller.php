<?php
$objBM = new Bookmarks('./build/bookmarks.json');

// Get Bookmarks list
$bookmarks = $objBM->getBookmarks();

// Bookmarks Menu (array key = 0)
$bookmark_menu = $objBM->formatBookmarkItems($bookmarks['0']['child']);

// Other Bookmarks (key = 1)
$other_bookmark = $objBM->formatBookmarkItems($bookmarks['1']['child']);

// WebDevStudy Bookmarks (key = 3)
$webdevstudy_bookmark = $objBM->formatBookmarkItems($bookmarks['3']['child']);

// Damber Bookmarks (key = 4)
$damber_bookmark = $objBM->formatBookmarkItems($bookmarks['4']['child']);
