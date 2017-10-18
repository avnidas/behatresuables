Feature:Drupal API Driver
  In order to show functionality added by the Drupal API driver to create Nodes


  @api
  Scenario: Create a node
    Given I am logged in as a user with the "administrator" role
    When I am viewing an "article" content with the title "My article"
    Then I should see the heading "My article"

  @api
  Scenario: Create many nodes
    Given "page" content:
      | title    |
      | Page one |
      | Page two |
    And "article" content:
      | title          |
      | First article  |
      | Second article |
    And I am logged in as a user with the "administrator" role
    When I go to "admin/content"
    Then I should see "Page one"
    And I should see "Page two"
    And I should see "First article"
    And I should see "Second article"

  @api
  Scenario: Create nodes with fields
    Given "article" content:
      | title                     | promote | body             |
      | First article with fields |       1 | PLACEHOLDER BODY |
    When I am on the homepage
    And follow "First article with fields"
    Then I should see the text "PLACEHOLDER BODY"

  @api
  Scenario: Create nodes with specific authorship
    Given users:
      | name     | mail            | status |
      | Joe User | joe@example.com | 1      |
    And "article" content:
      | title          | author   | body             | promote |
      | Article by Joe | Joe User | PLACEHOLDER BODY | 1       |
    When I am logged in as a user with the "administrator" role
    And I am on the homepage
    And I follow "Article by Joe"
    Then I should see the link "Joe User"

  @api
  Scenario: Create an article with multiple term references
    Given "tags" terms:
      | name      |
      | Tag one   |
      | Tag two   |
      | Tag three |
      | Tag four  |
    And "article" content:
      | title | body | promote | field_tags |