# Project Setup on local

* git clone https://github.com/porwal06/drupal10-zipcar.git in your PHP working directory (eg /var/www/html)
* cd drupal10-zipcar
* Run `composer install` to install all dependency
* Create mysql database & import attached database. ie https://github.com/porwal06/drupal10-zipcar/blob/main/db/zipcar.sql
* Open settings.php file and update database configuration at bottom of the file. https://github.com/porwal06/drupal10-zipcar/blob/main/web/sites/default/settings.php
* Project is ready to run on your localhost. ie. http://localhost/drupal10-zipcar/web
* Login with:
   - As admin -  admin/121212
   - As Authenticated user - deepak/123456
* Check URL as authenticated user
   - http://localhost/drupal10-zipcar/web/zipcar-rental (English)
   - http://localhost/drupal10-zipcar/web/fr/zipcar-rental (French)

  # Proof video

  https://github.com/user-attachments/assets/98822aac-c23e-49e5-b820-c98cb610a355


  # Todo

  * Few design fix issue for mobile/desktop screen
  * Add Loading icon while loading/searching cars for user interection
  * API validation handling
  * Fix missing logo image on multilingual site
 
  # Test with existing drupal project.
  
  * Download module & enable it. https://github.com/porwal06/drupal10-zipcar/tree/main/web/modules/custom/zipcar_rental
  * Download theme & set as default. https://github.com/porwal06/drupal10-zipcar/tree/main/web/themes/custom/zipcar_theme
  * For multilingual setting enable core Language module and setup from - /admin/config/regional/language

