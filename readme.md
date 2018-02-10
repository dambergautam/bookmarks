# Firefox Bookmark webpage
This project fetches the bookmark information from firefox profile database, dump
in JSON file, and populate them in webpage nicely.

I have used shell script to generate bookmark json file and php to display the
json file in webpage.


## But why?
Well, I used have bookmark adons which was supercool and helped to organize my bookmark listing. But, after my browser got upgraded to quantum version, it stop working. So, I just wanted to organize my bookmark and show them nicely when browser loaded just like my old bookmark adons.

## Project setup

```
# Clone the project
git clone <URL>

# Install sqlite3
brew install sqlite3

# Install CSV to JSON conversion tool
npm install csvtojson -g

# Update project and firefox profile paths in build/generate_bookmark.sh file
PROJECT_PATH="/Users/damber/Sites/damber/firefox_bookmarks/build"
FIREFOX_PROFILE_PATH="/Users/damber/Library/Application\ Support/Firefox/Profiles/*.default"

# Run Test
bash <root-directory>/build/generate_bookmark.sh
```
