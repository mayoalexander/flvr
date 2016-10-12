FREELABEL MUSIC DISTRIBUTION APP
==============
[Site Mock-ups] http://freelabel.net/admin/Documents/freelabel-layout.zip



# MAIN FEATURES


### Phase one:
- ~~Quick Register/Login~~
- ~~Upload Files (photos, songs, videos under 25MB)~~
- ~~public view (profile/posts)~~
- ~~Update Profile~~
- ~~Update Profile Photo~~

### Phase two:
- ~~Move Apps into the Admin Dashboard~~
- edit post functionality
- Create Audio Player (~~profile~/~~posts~~)
- ~~View Social Feeds~~
- ~~Feed (browse/discover)~~
- Likes
- Create Playlists
- Radio

### Phase Three:
- Update Profile Photo
- Social Networking (add/remove friends) 
- Add/Remove Friends
- Radio Uploading and Configuration

### Phase Four
- Categories
- Multiple Uploads of All Types
- Mobile Functionality + Styling
- API Connectivity
- Posting Status: Public, Personal, Private


### Issues + Bugs
- ~~[upload] adding additional data like description or tags is not great when uploading~~
- ~~[upload] need the ability to change twittername as an option when uploading~~
- [profiles] new users must go though an introduction or description of elements (Dashboard, Profile, Post Page, Friends)
- [general] navigation buttons need to disable while loading new page
- ~~[general] delete button needs to show if user is logged in, disappear when displayed on public feed~~
- ~~[general] create audioplayer solution for when a post is clicked~~
- ~~[general] add audioplayer to toolbar~~
- ~~When navigation accross different pages, the dashboard buttons do not work. loading the widget in the alternate view will cause dependency errors. The most effective solution would be to add a check for the URL and it running different functionality based on what page they are on~~
- ~~Headers must be dynamic to whatever content is being pulled by the URL~~
- ~~JS scripts need to be distributed effectively and consolidated~~
- ~~when searching, it searches though everyones post, even when private~~
- ~~no search found callback~~
- ~~search through all tracks when logged in, search for only public tracks if on public search~~
- ~~when uploading a file, there is no progress bar indicating that the upload is successful~~
- ~~when typing in a search, it runs a search for every letter, rather than having a character limit before running the SQL database query~~
- ~~share button functionality~~


## Phase Production Breakdown:
#### 1. Registration/Login
At first, create username, email, and password, THEN connect the the users first social media account to determine their primary social media and populate their profile information
- includes: Twitter, Facebook, Youtube, Souncloud.





# Codebase Documentation

### Config.php
This file contains all of the initial configuration such as site colors, logos, metadata, etc. into a `$site` object, created by initializing the `Config` class, using `$site = new Config();` in the `header.php` file.

The `Config` constructor class loads the custom settings for the site, such as:
- `background_color`
- `primary_color`
- `notifications_color`
- `success_color`
- `panel_color`
- `toolbar_color`
- `toolbar_text_color`
- `logo`


### Twitter Application
- URL: send post requests to `lvtr/views/twitter.php`
- Display Form: `$_POST['action']` set to `compose_new`
- Post to Public: `$_POST['action']` set to `post_public` and the actual text should be posted though `$_POST['message']`
- Get DMs: `$_POST['action']` set to `direct_messages` and the actual text should be posted though `$_POST['message']`
- Send DMs: `$_POST['action']` set to `send_direct_message` and the actual text should be posted though `$_POST['message']` and the user set to `$_POST['twitter']`

### Email Application
- URL: send post requests to `lvtr/views/email.php`

### Header.php
The header loads all of the site configuration settings into the `$site` object (by using `$site = new Config();`) and creates the header and toolbar, as well as custom inline styling.


### Views
All of the different applications and views will be available in the `views` directory. Those views are loading via AJAX when any of the navigation buttons are clicked, it sends the AJAX result to the `.data-container` element in the `index.php` file.


### Footer.php

