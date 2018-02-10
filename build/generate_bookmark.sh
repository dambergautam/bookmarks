#!/bin/bash

# Paths
PROJECT_PATH="/Users/damber/Sites/damber/firefox_bookmarks/build"
#FIREFOX_PROFILE_PATH="/Users/damber/Library/Application\ Support/Firefox/Profiles/*.default"

cd /Users/damber/Library/Application\ Support/Firefox/Profiles/*.default

# Generate CSV (bookmarks.csv) using SQL file (export_query.sql)
# to fetch bookmark information from firefox profile database (places.sqlite)
/usr/bin/sqlite3 -header -csv places.sqlite < "$PROJECT_PATH/export_query.sql" > "$PROJECT_PATH/bookmarks.csv"

cd $PROJECT_PATH

# Generate json file
csvtojson bookmarks.csv > bookmarks.json

rm -f places.sqlite
