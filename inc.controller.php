<?php
$objBM = new Bookmarks('./bookmarks.json');

// Get Bookmarks list
$bookmarks = $objBM->getBookmarks();

// Custom Bookmarks folder
$custom_bookmarks_folder = array_diff_key($bookmarks, $objBM->definedBookmarks());

// Bookmarks Menu
$bookmark_menu = $objBM->formatBookmarkItems($bookmarks['bm']);

// Other Bookmarks
$other_bookmark = $objBM->formatBookmarkItems($bookmarks['ob']);

$cbm = 0;
$custom_bookmarks = array();
foreach($custom_bookmarks_folder as $customKey => $customVal) {
	
	if (isset($customVal['children'])) {
		$custom_bookmarks[$cbm]['title'] = '<h2>'.$customVal['title'].'</h2>';
	}
	
	//var_dump($bookmarks[$customKey]); die();
	$custom_bookmarks[$cbm]['items'] = $objBM->formatBookmarkItems($customVal['children']);

	$cbm++;
}


/*
class MyDB extends SQLite3
{
    public function __construct( $file )
    {
        $this->open( $file );
    }
}

$dir = 'sqlite:places.sqlite';
$db = new PDO($dir) or die("Cannot open the database");
var_dump($db); die();
if ($db) {
    $sql = "SELECT * FROM moz_bookmarks";
    $res = $db->query($sql);
    var_dump($res);
} else {
    echo "database connection failed";
}

die();
 */
