<?php


class NewsController
{
  public function actionIndex()
  {
    echo 'NewsController actionIndex method is run. <br>';

    $string = '21-11-2015';
    
    echo "$string<br>";

    $pattern = '/([\d]{2})-([\d]{2})-([\d]{4})/';

    $replacement = 'Year $3, month $2, day $1';

    echo preg_replace($pattern, $replacement, $string);

    return true;
  }
}