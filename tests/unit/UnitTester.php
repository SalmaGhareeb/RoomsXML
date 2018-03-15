<?php

namespace SalmaAbdelhady\RoomsXML\Tests\unit;

use SalmaAbdelhady\RoomsXML\RoomsXMLAuthentication;

class UnitTester extends \Codeception\Test\Unit
{

    /**
     * @var \UnitTester
     */
    protected $tester;

    protected  $auth;

    protected function _before()
    {
        $this->auth = new RoomsXMLAuthentication();

        $this->auth->setOrg('fllc'); //Agency ID
        $this->auth->setUserName('xmltest'); //Username
        $this->auth->setPassword('xmltest' ); //Password
        $this->auth->setVersion('1.26');
        $this->auth->setCurrency('USD');
        $this->auth->setLanguage('en');//optional
        $this->auth->setDebugMode(true);//optional
        $this->auth->setTestMode(true);//optional
    }
}