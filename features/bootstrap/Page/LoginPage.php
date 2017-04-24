<?php
namespace Erm\Behat\Bootstrap\Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Factory;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use Behat\Mink\Session;


class LoginPage extends Page {
    /**
     * @var string $path
     */
    protected $path = '/login';

    public function __construct(Session $session, Factory $factory, array $parameters = array())
    {
        parent::__construct($session, $factory, $parameters);
        $this->getSession()->start();
    }

    /**
     * @var array $elements
     **/
    protected $elements = array(
        'Email Field' => 'input#inputUsername',
        'Password Field' => 'input#inputPassword',
        'Login Button' => 'button#loginButton',
        'Facebook Login' => 'a#fbLoginButton'
    );

    public function inputEmail($email)
    {
        $this->getElement('Email Field')->setValue($email);
    }

    public function inputPassword($password)
    {
        $this->getElement('Password Field')->setValue($password);
    }

    public function clickLoginButton()
    {
        $this->getElement('Login Button')->click();
    }

    public function clickFacebookLoginButton()
    {
        $this->getElement('Facebook Login')->click();
    }

    public function getCurrentUrl()
    {
        return $this->getSession()->getCurrentUrl();
    }

    public function isLoggedIn()
    {
        return $this->getSession()->getCookie('usercode');
    }

    public function stopSession()
    {
        $this->getSession()->stop();
    }

}