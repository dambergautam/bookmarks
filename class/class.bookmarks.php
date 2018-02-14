<?php
class Bookmarks
{
	public $data = array();

	public function __construct($file)
	{
		if (is_readable($file) && filesize($file) > 0) {
			$json_data = file_get_contents($file);
			$this->data = json_decode($json_data, true);
		} else {
			echo "<div style='text-align:center; margin:20% 25%;'>
					<img src='images/danger.png' height='80'>
					<h2> Unable to open <i>".$file."</i> file!</h2>
				  </div>";
			die();
		}
		//var_dump($this->data);
	}

    /**
     * Organize bookmark information with parent and child structure
     */
    public function getBookmarks()
    {
        /**
         * Get bookmark folder (parent)
         *
         * Getting parent directory only (type = 2)
         *  type =1 (Child -Bookmark url)
         *  type =2 (Parent folder)
         *
         * Ignore Recent Tags, Music, and All Bookmark directory and their child
         * Recent Tags = 3, Music = 4, All Bookmark = 21
         */
        $folders = array_filter($this->data, function($entry) {
            if (
                   $entry['type'] == 2
                && !in_array($entry['id'], array(3, 4, 21))
                && !in_array($entry['parent'], array(3, 4, 21))
            ) {
                return $entry;
            }
        });


        /**
         * Get all child bookmark url
         */
        $j =0;
        $output = array();
        foreach ($folders as $folder) {
            $output[$j] = $folder;

            // Get bookmar list of selected parent only
            $matches = array_filter($this->data, function($entry) use ($folder) {
                if ($entry['parent'] == $folder['id'] and $entry['type'] =1) {
                    return $entry;
                }
            });

            $output[$j]['child'] =$matches;
            $j++;
        }
        return $output;
    }


	/**
	 * Format bookmark items -adding links, icons, titles
	 */
	public function formatBookmarkItems(array $bmArray = array())
	{
        // Rebase array keys
        $bmArray = array_values($bmArray);

		$i = -1;
		foreach ($bmArray as $bmItem) {

			++$i;

			// Ignore recent tags
			if ($bmItem['title'] == "Recent Tags") { unset($bmArray[$i]); continue; }

			// Ignore blank title items
			if ($bmItem['title'] == "") { unset($bmArray[$i]); continue; }

			// Ignore folder items
			if ($bmItem['type'] == "2") { unset($bmArray[$i]); continue; }

			// Only list item with url attribute
			if (isset($bmItem['url'])) {

				$img = (isset($bmItem['preview_image_url']) && !empty($bmItem['preview_image_url'])) ? '<img src="'.$bmItem['preview_image_url'].'" height="20">' :
					'<img src="images/noimage.png" height="20">';

				$tags = isset($bmItem['tags']) ? $bmItem['tags'] : '';


				$bmArray[$i]['data'] = $img .
								' <a href="'.$bmItem['url'].'" target="_blank">'.$bmItem['title'].'</a>'.
								' <span class="tags">'.$tags.'</span>';
			}
		}

		return $bmArray;
	}
}
