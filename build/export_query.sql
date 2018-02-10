SELECT
  a.id, a.parent, a.type, a.title, b.url
FROM
  moz_bookmarks AS a JOIN moz_places AS b ON a.fk = b.id
WHERE
  a.title IS NOT null
ORDER BY
  a.type, a.parent, a.position;
