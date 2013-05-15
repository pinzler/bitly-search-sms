# Bitly Search SMS with Twilio
=================================================================================

SMS a search term to a phone number and get the top Bitly Search result with title, source and a shortened link.  (Learn more about the Bitly APIs - [http://dev.bitly.com/](http://dev.bitly.com/).)

## Setup on Bitly

Go to [http://bitly.com/a/oauth_apps](http://bitly.com/a/oauth_apps) and create a Generic Access Token using the form at the bottom of the page.  Insert your access token into the BitlySearchSMS.php file for the value of $access_token on line 3.

## Setup on Twilio

Go to [Twilio](http://www.twilio.com) and buy a phone number.  Use the web location of BitlySearchSMS.php for the "SMS Request URL" for that phone number.  That's it.