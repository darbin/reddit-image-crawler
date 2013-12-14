How to install:
1. Open crawler.php in a text editor and edit the variables at the beginning to your liking. You must include a reddit account for this to work.
2. Run the script.

Debugging:
1. In another browser tab log into the reddit account connected to the crawler. 
2. Navigate to the hidden section of your account. If you cant find it, it will be located at: http://www.reddit.com/user/YOUR_REDDIT_USERNAME_HERE/hidden/
3. Run the script and refresh your hidden page. You should notice it being populated with posts. If not go to section A.
4. Now keep refreshing the page until you notice the crawler has finished hiding the posts.
5. Open the location you set to save the images to. The default is the images folder in the root of this project.
6. Is the folder being populated with images? If not go to section B.

SECTION A:
Your crawler either does not have access to your reddit account or has an invalid subreddit.
Check your $username, $password, and $subreddit variables for spelling errors.

SECTION B:
Your crawler has access to your reddit account and is successfully hiding posts however it is not saving the images.
You may have a spelling error in the $file_type or $path variables.

SECTION B FOR LINUX ENVIROMENTS:
If you are running this as a cronjob this may also be caused by not having sufficient write privileges to the $path folder.
Log into the root user with "sudo su" then use "crontab -e" to get to the root's crontab. Anything you put in here should be run as root, fixing the problem.
If that didn't do it you may have set the $path variable to a retaliative path like: "images/" crontab runs all scripts in the home directory so you will need to include an absolute path like: "/media/mounted/images".

Thank you for using my script, questions, comments, and concerns can be directed at me via my email at: garrettsoumon@gmail.com
To learn more about my recent projects you can find my blog at: http://garrettblackmon.wordpress.com/
also a special thanks to the devs that created Reddit PHP SDK which can be found here: https://github.com/jcleblanc/reddit-php-sdk