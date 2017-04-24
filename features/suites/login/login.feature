Feature: Logging with registered user credentials

  Scenario Outline: Logging with correct email and password
    Given I am on login page
    When I input <registered_email> into email editbox
    When I input <registered_password> into password editbox
    And Click Login button
    Then I should be logged in
  Examples:
  | registered_email          | registered_password |
  | test1115@gmail.com        | test                |

  Scenario Outline: Logging with correct email but incorrect password
    Given I am on login page
    When I input <email> into email editbox
    And I input <password> into password editbox
    And Click Login button
    Then I should be not logged in
  Examples:
    | email                     | password |
    | test1115@gmail.com        | 12345    |
    | something@something.com   | test     |
    | test1115@gmail.com        |          |
