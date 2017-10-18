Feature:Drupal API Driver
  In order to show functionality added by the Drupal API driver to create Terms

  @api
  Scenario: Create a term
  Given I am logged in as a user with the "administrator" role
  When I am viewing a "tags" term with the name "My tag"
  Then I should see the heading "My tag"


