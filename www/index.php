<?php

use Webforge\Minimock\Container;

$boot = require __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'bootstrap.php';
$container = new Container($boot->getPackage(), $boot->getWebforge()->getVendorPackage('webforge/minimock'));
$engine = $container->getTemplateEngine();

print $engine->render('one-pager/layout', $model = (object) array(
  'features'=>array(
    (object) array(
      'id'=>'about',
      'img'=>array(
        'src'=>'http://placecreature.com/500/500',
        'class'=>'pull-right'
       ),
      'headline'=>'This First Heading',
      'caption'=>'Will Catch Your Eye',
      'text'=>'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.'
     ),

    (object) array(
      'id'=>'services',
      'img'=>array(
        'src'=>'http://placecreature.com/500/500',
        'class'=>'pull-left'
      ),
      'headline'=>'The Second Heading',
      'caption'=>'Is Pretty Cool Too.',
      'text'=>'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.'
    ),

    (object) array(
      'id'=>'contact',
      'img'=>array(
        'src'=>'http://placecreature.com/500/500',
        'class'=>'pull-right'
      ),
      'headline'=>'The Third Heading',
      'caption'=>'Will Seal the Deal.',
      'text'=>'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.'
    )
  )
));