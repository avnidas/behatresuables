Feature: To test login functionality


  Scenario: To test the login functionality with specific credentials
    Given I am on "https://yoursite.com"
    When I press "Sign in"
    When I fill in "username_field" with "username"
    And I fill in "password_field" with "password"
    And I press "Sign In"
#    if reusing the same step several times, please create a step definition in the FeatureContext.php file.

  @api
  Scenario: Login using DrupalAPIDriver and view and article
    Given I am logged in as a user with the "administrator" role


  @api
  Scenario: Create users
    Given users:
      | name     | mail            | status |
      | Joe User | joe@example.com | 1      |
    And I am logged in as a user with the "administrator" role
    When I visit "admin/people"
    Then I should see the link "Joe User"

  @api
  Scenario: Login as a user created during this scenario
    Given users:
      | name      | status |
      | Test user |      1 |
    When I am logged in as "Test user"
    Then I should see the link "Log out"


  Scenario: Error messages upon login
    Given I am on "user/login"
    When I press "Log in"
    Then I should see the error message "Password field is required"
    And I should not see the error message "Sorry, unrecognized username or password"
    And I should see the following error messages:
      | error messages                       |
      | Username or email field is required. |
      | Password field is required           |
    And I should not see the following error messages:
      | error messages                                                                |
      | Sorry, unrecognized username or password                                      |
      | Unable to send e-mail. Contact the site administrator if the problem persists |
