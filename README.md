#Dance Production website
Eusoff Dance Production website

##How to setup
1. copy folder `DP1415` to path xampp/htdocs
2. Update database username and password in `include/constant.php`
3. start your `apache` and `mysql` server
4. enter url `localhost/phpmyadmin`
5. create a database named `dp_booking`
6. import file `schema.sql` into database `dp_booking`
7. enter url `localhost/script.php` in browser
8. copy the content of the page 
9. In database `dp_booking`, open `SQL` tab, paste and run the content
10. enter url `localhost/DP1415` in browser

##Proposed Changes
###General
* Change fonts to `Helvetica` or similar
* Change background
* Change title

###Booking Page
* Add seat selection restriction: Cannot leave one seat empty in between booked seats
* Modify the layout of the page with an immediate update of information in the side bar
* Include a Personal Detail page after seat selection
  *  Name
  *  Matriculation Number
  *  Email Address
  *  Mailing Address
  *  Modes of Ticket Collection: from friends / mailing
	  *  Additional charge for registered mail
  *  Purchase of flower(s) for Charity: 
	  *  Type
	  *  Amount
	  *  Colour Preference
	  *  Special Requests for Bouquets
	  *  Collection method
		  *  Backstage distribution by our committee members
		  *  Self-collection at front-of-house on show day, 6:15 - 7:30

###Checkout Page
* Display information prompting users to transfer payment to designated bank account upon email confirmation (to be confirmed)

###Gallery
* Change background

###Synopsis Page
* Modify the layout into one column  
