_____________________________________________________________________________________________________
								|							  |
								|	   	   STANDARDS 	  	  |
								|_____________________________|

1 ==> PHP files :

		-> config file : containe 2 php files , functions.php and db.php

		-> function file : by the name you already know that it's the file responsible of all the functions on the website 

		-> db(database) file : containe the connection the the database 

		-> Uplade file : coming soon , it'll be responsible of uplading things such as pictures, games, files... 

2 ==> stats of a task :

		-> TODO : haven't put thoughts on it , just a general idea about that task but nothing about how it's gonna/should be done.

		-> in Progress : we got the idea , we got some thoughts about it ,and we're trying to find the best one.

		-> Done : went through the past to stats and finished (WORKING FINE). 
___________________________________________________________________________________________________
								|							  |
								|	    PROBLEMS AND FIXS 	  |
								|_____________________________|

1 ==> EDIT ACTION DOESN'T WORK AT ALL . (DONE) 

	Problem ? :> 	CSS : Class doesn't work unless it inside another class 
					in that case my CSS caused the dropdown-list to disapear completely.
				 	
				 		fix ?:> simple changes on CSS. 
				 	
				 	PHP : included the Functions files twice so it couldn't call the Updateuser function 
				 	because it has been declared twice.

				 		fix ?:> deleted the duplicate include i added.

2 ==> SEEMED LIKE EVERY BODY WAS ABLE TO ACCESS THE DIRECTORY OF THE FILES . (in progress)

	Problem ? :> it shouldn't be that every directory is accessible for the users ,but we got that problem that every one can see 
				 what's inside every folder in the server 

			Fix ? :>   	Temporary :	Add a index.php in every direcroty , the index rederect you to 404.html page where you get to 
									know that you don't have a permission to that directory.

									for now this solution denies every attempt to access them directories .

						Idea : write some php code to check if the user who's trying to access the directory is actualy having permission for that. 

_____________________________________________________________________________________________________
								|							  |
								|	   TO EDIT AND IDEAS 	  |
								|_____________________________|

1 ==> Fix the edit page apearing (it sucks)

	Ideas :>

	 	- Make it look like the profile page but editable ...
		
		- Keep just the picture style from the profile and make everythings else simple ?

2 ==> That 404 page though (needs some work bro) 
	
	Ideas :> 

		- Simple 404 Page with a giant 404 in the middle ? 
		
		- Make a meme out of this ? 
		
					ideas ::>	the one that's used right now but put more CSS/JS into it



