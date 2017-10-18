To get started run the following commands:

1. Setting up composer.json
composer require drupal/drupal-extension='~3.0'
composer require guzzle/guzzle='~3.9'
composer require sensiolabs/behat-page-object-extension='~2.0'
composer require behat/mink='~1.5'


Your composer.json should look something similar to
{
  "require": {
    "drupal/drupal-extension": "~3.0",
    "guzzle/guzzle": "^3.9",
    "sensiolabs/behat-page-object-extension": "^2.0",
    "behat/mink": "~1.5"
  },
  "config": {
    "bin-dir": "bin/"
  }
}


2. Run bin/behat --init

3. Define your own steps in /features/bootstrap/FeatureContext.php

4. Start adding your feature files to the features directory of your repository.

5. Place images or files to be uploaded under features/Resources folder

6. Screenshots of failed steps shall be saved under features/screenshot


# behatresuables
