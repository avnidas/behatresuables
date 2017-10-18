<?php

use Drupal\DrupalExtension\Context\DrupalContext;
use Drupal\DrupalExtension\Context\RawDrupalContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends DrupalContext implements SnippetAcceptingContext {

  /**
   * Initializes context.
   *
   * Every scenario gets its own context instance.
   * You can also pass arbitrary arguments to the
   * context constructor through behat.yml.
   */

  
  public function __construct() {
  }

  /**
   * @Given /^I take a screenshot$/
   */
  public function iTakeAScreenshot()
  {
    $filePath = "/Users/avni/working/BehatDemo/features/screenshot";
    $fileName = date('d-m-y').'-'.uniqid();
    $htmlFile = $filePath.'/'.$fileName.'.html';
    file_put_contents($htmlFile, $this->getSession()->getPage()->getContent());
    printf('Html saved at '.$htmlFile);
  }


}
