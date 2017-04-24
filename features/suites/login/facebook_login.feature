Feature: Login with Facebook

  Scenario: Login with not logged in Facebook user
    Given I am on login page
    When I click Login with Facebook button
    Then Facebook login page is opened