# Login
This login system allows the user to create an account and login as expected. 
It was developed to practice PHP and to create a simple application that is commonly used in larger applications. 


A message is printed on the screen when entering invalid credentials on the Login screen. 
Below are some of the specific cases in which messages appear: 

Login:
   1. Upon entering an invalid password for an existing username, the app will print "Invalid Password" on login screen.
   2. If a username is entered that doesn't exist, the app will print "Username doesn't exist" on login screen.

For creating an account:
  1. If not all required fields are filled out, an alert will appear that asks the user to fill out all required fields before returning back to registration form. (The code for this functionality was borrowed from a tutorial). 
  2. If a username that already exists is entered, it will return to the form after asking the user to enter another username. The front-end for this portion was borrowed from a tutorial (https://www.sitepoint.com/users-php-sessions-mysql/), but the backend functionality (connecting to database and using prepared statements) was developed after being exposed to MySQL & PHP tutorials (https://alexwebdevelop.com/how-to-learn-php/). 


Explanation of files: 
signup.php- the action performed when "Submit" is clicked when creating a new use through newuser.php 
newuser.php - the UI for registering a new user 
login.php - the action performed when "Login" is clicked on UserLoginForm.html
UserLoginForm.html - the UI for login screen
common.php - borrowed from a tutorial - contains an error() method for displaying error messages and returning to previous page 

