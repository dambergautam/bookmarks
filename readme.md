# Firefox Bookmark webpage
This project fetches the bookmark information from Firefox profile database, dump
in JSON file, and populate them in webpage nicely.

I have used a shell script to generate bookmark json file and PHP to display the
bookmarks in a webpage.

## But why?
Well, I used have bookmark add-on which was awesome and helped to organize my
bookmark listing. But, after my browser got upgraded to quantum version, it
stopped working. So, I just thought to create something like my old Firefox extension.

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
