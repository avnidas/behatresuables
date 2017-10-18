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

   /** @Then /^I fill in "([^"]*)" with "([^"]*)" days from today$/
     */
    public function iFillInWithDaysFromToday($field, $day)
    {

        $day = '+'.$day.' days';
        $dt3 = strtotime($day);
        $set_date = date('m/d/Y', $dt3);
        $this->getSession()->getPage()->fillField($field,$set_date);

    }


    /**
     * Sets the specified multi-line value to the field
     * @Given /^I set the text field  "(?P<field_string>(?:[^"]|\\")*)" with multi-line text:/
     */
    public function i_set_the_text_field_with_multi_line_text($field, \Behat\Gherkin\Node\PyStringNode $value) {
        $session = $this->getSession();
        $page = $session->getPage();
        $page->fillField($field, $value);
    }

    
     /**
     * @Then /^I fill in "([^"]*)" with a random value$/
     */
    public function iFillInWithARandomValue($field)
    {
        $randomvalue = $this->getRandom()->name(15);
        $this->getSession()->getPage()->fillField($field,$randomvalue);
    }


     /**
     * @Then /^I fill in the "([^"]*)" with a "([^"]*)"$/
     */
    public function iFillInTheWithA($locator, $value)
    {
        $field = $this->getSession()->getPage()->findField($locator);
        if (null === $field) {
            throw new ElementNotFoundException(
                $this->getSession(), 'form field', 'id|name|label|value', $locator
            );
        }
        $field->setValue($value);


    }



    

   //The below snippet extracts the html content from the page - and extracts a pattern
   /**
            $content=$this->getSession()->getPage()->getContent();
            function get_token($string) {
                $pattern = "#<\s*?code\b[^>]*>(.*?)</code\b[^>]*>#s";
                preg_match($pattern, $string, $matches);
                return $matches[1];
            }
            $token =  get_token($content);
            if($token != '') {
                echo $token;
            } 
   
   */

}
