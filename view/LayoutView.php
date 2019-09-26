<?php


class LayoutView {
  
  public function render($isLoggedIn, $v, $dtv, $link) {

    if($link == 'Back to login') {
      $href = '?';
    } else {
      $href = '?register';
    }

    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->renderIsLoggedIn($isLoggedIn, $link, $href) . '
          
          <div class="container">
              ' . $v->response($isLoggedIn) . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($isLoggedIn, $link, $href) {
    if ($isLoggedIn) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '
      <a href="' . $href . '">'. $link .'</a>
      <h2>Not logged in</h2>';
    }
  }
}
