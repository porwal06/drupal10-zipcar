# Project Setup

* git clone https://github.com/porwal06/drupal10-zipcar.git in your PHP working directory (eg /var/www/html)
* cd drupal10-zipcar
* Run `composer install` to install all dependency
* Create mysql database & import attached database. ie https://github.com/porwal06/drupal10-zipcar/blob/main/db/zipcar.sql
* Open settings.php file and update database configuration at bottom of the file. https://github.com/porwal06/drupal10-zipcar/blob/main/web/sites/default/settings.php
* Project is ready to run on your localhost. ie. http://localhost/drupal10-zipcar/web
* Login with:
  As admin -  admin/121212
  As Authenticated user - deepak/123456

  # Proof video

  https://github.com/user-attachments/assets/98822aac-c23e-49e5-b820-c98cb610a355


  #Todo

  * Few design fix issue for mobile/desktop screen
  * Add Loading icon while loading/searching cars for user interection
  * API validation handling

