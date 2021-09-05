# *Be Your Chief*

Application by:  

 - *Paul Piazza*
 - *Nathan Finance*
 - *Nadine Fischer*
 - *Jules Debeaumont*
 - *Roja Gahfarri*

### Install and config:

 - Clone the project
 - Do a `composer install` 

### Database:

 - Log as admin on your localhost/phpmyadmin  
 - Make a new user for the Symfony4 access
 - Copy the `.env` file
 - Paste and rename the second one to `.env.local` at /
 - Add `.env.local` to `.gitignore` file
 - In the `.env.local`:

*These settings are suggestions, put whatever you want :*  
User: `ProjetB`  
Password: `iutinfo`  

 - Once done, edit the `.env.local` you made  
 - Make sure the database access looks like the following one:  

`DATABASE_URL="mysql://ProjetB:iutinfo@127.0.0.1:3306/ProjetB?serverVersion=5.7"` 


### Useful commands:

*This will delete the database if there's one, create a new one depending on the actual entities of the project, apply migrations and load all fixtures.*
- `composer reset`

*Control the code with CS-fixer :* 
- `vendor/bin/php-cs-fixer fix --dry-run`

*Validate code with CS-Fixer :*
- `vendor/bin/php-cs-fixer fix
  `
