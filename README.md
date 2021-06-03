# laravel 8
## implemented things given below
   - Blade templet
   - Schema
   - Mirgate
   - Controller
   - Storage
   - Validation
   - Session
   
        
       
_______________________________________________________________________
## About this project
- database name : table
- table name : blog_data
- tables schema are given just need to migrate
    - column
	    - titel(i now it's spelling mistake , but use it for a reason, so pardon me)
		- img (short form for image)
		- dis (short form for description)	

- mainly focused on image crud
- mage crud system
    - read a image
	- create a image
	    - image name(if exist or not)
	    - image preview
	    - jpg,png validation
	- edit and update  a image
        - image name(if exist or not)
	    - image preview
	    - jpg,png validation	    
        - uploaded image extensions will aslo update
    - delete a image
        - remve image from public directory
- validate
    - required , jpg and png	    
- validate error massage
    - send fail massage to blade with $error
- session massage
    - if submission success , send a massage through session
	
