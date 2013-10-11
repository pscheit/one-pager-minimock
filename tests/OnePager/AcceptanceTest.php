<?php

namespace OnePager;

use Webforge\Code\Test\GuzzleTester;
use Webforge\Code\Test\HTMLTesting;

class AcceptanceTest extends \Webforge\Code\Test\Base implements HTMLTesting {
  
  public function setUp() {
    parent::setUp();

    $url = 'http://one-pager-minimock.desktop.ps-webforge.net/';

    $this->guzzle = new GuzzleTester($url);
    $this->guzzle->setDefaultAuth('user', 'secret');
  }

  public function testThatTheMustacheTemplateEqualsTheHTMLTemplate() {
    $this->guzzle->get('/');

    $response = $this->guzzle->dispatch();

    $this->html = (string) $response->getBody();

    $this->css('html')->count(1)
      ->css('body')->count(1)
        ->css('nav.navbar')->count(1)->end()
        ->css('div.container.features')->count(1)
          ->css('div.featurette:eq(0)')->count(1)->hasAttribute('id', 'about')
            ->css('img')->hasClass('pull-right')->end()
          ->end()
          ->css('div.featurette:eq(1)')->count(1)->hasAttribute('id', 'services')
            ->css('img')->hasClass('pull-left')->end()
          ->end()
          ->css('div.featurette:eq(2)')->count(1)->hasAttribute('id', 'contact')
            ->css('img')->hasClass('pull-right')->end()
          ->end()
          ->end()
        ->end()
    ;
  }

  protected function onNotSuccessfulTest(\Exception $e) {
    $this->guzzle->debug();
    throw $e;
  }
}
