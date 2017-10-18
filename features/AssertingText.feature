Feature: Test DrupalContext

  Scenario: Test the ability to find a button in a region
    Given I am on the homepage
    Then I should see "Search" in the "left sidebar"

  Scenario: Test the ability to find content in a region
    Given I am on the homepage
    Then I should see "Welcome to DrupExtn" in the "content" region

  Scenario: Test the ability to find a button without specifying region
    Given I am on the homepage
    Then I should see "Search"

  Scenario: Test the ability to find content without specifying region
    Given I am on the homepage
    Then I should see "Welcome to DrupExtn"


