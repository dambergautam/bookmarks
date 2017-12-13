<?php 
class Bookmarks
{
	public $data = array('a'=>'b');

	public function __construct($file)
	{
		if (is_readable($file)) {
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
	 * Return all bookmark folders (including child folders)
	 */
	public function getBookmarks()
	{
		$output = array();

		$j = 0;
		$lev1 = $this->data['children'];
		foreach ($lev1 as $lev2) {
			// Bookmarks Menu
			if ($lev2['title'] == "Bookmarks Menu") {
				$output = $this->appendChildItems('bm', $lev2, $output);
			}

			// Bookmarks Toolbar
			if ($lev2['title'] == "Bookmarks Toolbar") {
				$output = $this->appendChildItems('bt', $lev2, $output);
			}

			// Other Bookmarks
			if ($lev2['title'] == "Other Bookmarks") {
				$output = $this->appendChildItems('ob', $lev2, $output);
			}

			// Mobile Bookmarks
			if ($lev2['title'] == "Mobile Bookmarks") {
				$output = $this->appendChildItems('mb', $lev2, $output);
			}
			$j++;
		}
		return $output;
	}

	/**
	 * Append child bookmark folders into all-bookmark array 
	 */
	public function appendChildItems($index, array $lev2 = array(), array $output = array())
	{
		if (!isset($lev2['children']) || empty($lev2['children']) || !is_array($lev2['children'])) {
			$output[$index] = $lev2;
			return $output;
		}

		$i = 0;
		foreach($lev2['children'] as $child) {
			if (isset($child['children'])) {
				$output[$child['title']] = $child;
				unset($lev2['children'][$i]);
			}
			$i++;
		}

		// Reset array index
		$output[$index] = array_values($lev2['children']);
		
		return $output;
	}


	/**
	 * Format bookmark items -adding links, icons, titles
	 */
	public function formatBookmarkItems(array $bm = array())
	{
		$i = -1;
		foreach ($bm as $bmItem) {

			++$i;

			if ($bmItem['title'] == "Recent Tags") { unset($bm[$i]); continue; }

			if ($bmItem['title'] == "") { unset($bm[$i]); continue; }

			if (isset($bmItem['uri'])) {
				$img = isset($bmItem['iconuri']) ? '<img src="'.$bmItem['iconuri'].'" height="20">' : 
					'<img src="images/noimage.png" height="20">';
				
				$tags = isset($bmItem['tags']) ? $bmItem['tags'] : '';

				$bm[$i]['data'] = $img .
								' <a href="'.$bmItem['uri'].'" target="_blank">'.$bmItem['title'].'</a>'.
								' <span class="tags">'.$tags.'</span>';

			} elseif (isset($bmItem['children'])) {
				$bm[$i]['data'] = '<h2>'.$bmItem['title'].'</h2>';

			} else {
				$bm[$i]['data'] = '<b>'.$bmItem['title'].'</b>';
			}
		}
		
		return $bm;
	}


	public function definedBookmarks()
	{
		return ["bm" => "Bookmarks Menu", "bt" => "Bookmarks Toolbar", 
				"ob" => "Other Bookmarks", "mb" => "Mobile Bookmarks"];
	}

	/**
	public function getChildItems(array $bmVal = array())
	{
		$output = '';
		if (empty($bmVal) || !isset($bmVal['children'])) {
			return $output;
		}

		$i = -1;
		foreach ($bmVal['children'] as $item) {
			++$i;
			
			if ($item['title'] == "") { continue; }

			if (isset($item['uri'])) {
				$output .= '<li class="list-group-item">
								<a href="'.$item['uri'].'">'.$item['title'].'</a>
							</li>';
			}
		}
		return !empty($output)? '<ul class="list-group">'.$output.'</ul>' : $output;
	}
	*/
}