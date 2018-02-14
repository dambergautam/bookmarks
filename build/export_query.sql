SELECT
  a.id, a.parent, a.type, a.title, b.url, b.preview_image_url
FROM
  moz_bookmarks AS a LEFT JOIN moz_places AS b ON a.fk = b.id
WHERE
	a.title IS NOT NULL AND TRIM(a.title) <> ''
ORDER BY
  a.type, a.parent, a.position;
