•	A clear use of HTML5 <br>
o	The website structure is built using HTML5.<br>
<br>
•	Use of the Bootstrap framework providing a responsive layout<br>
o	The websites use bootstrap to style core structures. For example, Navbar. Bootstrap is scattered throughout the entire website. (php/main_index/nav.php)<br>
<br>
•	Use of JavaScript to manipulate the DOM based on an event<br>
o	I added a feature where a user can see their password. This was implemented using the DOM and events. (js/password-show.js [entire file])<br>
<br>

•	JavaScript loading of dynamically changing information<br>
o	I added a countdown to Christmas feature which dynamically updates every second. (js/ days-till-christmas.js [entire file] )<br>
<br>
•	Use of jQuery in conjunction with the DOM<br>
o	I added a hover over effect which made it clear that an image was clickable. (js/ DOM-tour-dates.js[entire file])<br>
<br>
•	Use of a jQuery plugin to enhance your application<br>
o	I used a plugin which adds a pop which request the user to sign in.(index.php [line 33])<br>
<br>
•	Use of AJAX (pure JavaScript i.e. without the use of a library)<br>
o	I u•	A clear use of HTML5<br>
o	The website structure is built using HTML5.<br>
<br>
•	Use of the Bootstrap framework providing a responsive layout<br>
o	The websites use bootstrap to style core structures. For example, Navbar. Bootstrap is scattered throughout the entire website.<br>
<br>
•	Use of JavaScript to manipulate the DOM based on an event<br>
o	I added a feature where a user can see their password. This was implemented using the DOM and events. (js/password-show.js [entire file])<br>
<br>
•	JavaScript loading of dynamically changing information<br>
o	I added a countdown to Christmas feature which dynamically updates every second. (js/ days-till-christmas.js [entire file] )<br>
<br>
•	Use of jQuery in conjunction with the DOM
<br>o	I added a hover over effect which made it clear that an image was clickable. (js/ DOM-tour-dates.js[entire file])

<br>•	Use of a jQuery plugin to enhance your application
<br>o	I used a plugin which adds a pop which request the user to sign in.(index.php [line 33])
<br>
<br>•	Use of AJAX (pure JavaScript i.e. without the use of a library)
<br>o	I used ajax to load in a text file which was used as a terms of service. This allows easy editing of the document. (js/toc.js [entire file])
<br><br>•	Use of the jQuery AJAX function
<br>o	I, similar to above, read in a text file but for the privacy policy instead.(js/privacyPolicy [entire file])
<br><br>•	Use of cookies
<br>o	I used cookies to remember a users name after leaving a comment (php/functions.php [addComment($conn) line 109])
<br><br>•	User login functionality (PHP/MySQL)
<br>o	I have a login form which allows users to edit the website. (functions.php [signIn($conn) line 252])
<br><br>•	Admin section of the website (PHP/MySQL) 
<br>o	I have a section which allows admins to login.(php/admin [entire folder]) Access using ~1704736/coursework/index.php?admin username:admin password:admin
<br><br>•	Ability to select, add, edit and delete information from a database (PHP/MySQL)
<br>o	I have allowed admins to add, edit and delete data about blog posts, tour dates and the store. [php/admin[entire folder]]
<br><br>•	Appropriate consideration of relevant laws
<br>o	I have considered various laws and such as cookies, privacy policy and terms and conditions.
<br><br>•	Security measures
<br>o	I built the website with security in mind! (php/functions.php [entire file])
<br><br>•	SQL queries should be written as prepared statements
<br>o	I did this (php/functions.php [entire file])
<br><br>•	Passwords should be salted and hashed
<br>o	I used the password_hash and password_verify functions which hash and salt a password.  (php/functions.php [lines 182, 264 ])
<br>o	(http://php.net/manual/en/function.password-hash.php)
<br><br>•	Validation of user input
<br>o	I used unset to prevent duplicating data. And used “require” in the html side. (php/functions.php [preventFormDuplication($thingToUnset, $urlId) line 99])
<br><br>•	Any other relevant security features
<br>o	…
