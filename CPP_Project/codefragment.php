//Garder quand meme la structure conditionnelle if isset($loggedUser[‘login’]) (juste celle-là) puis :
//- dans cette structure, insérer le code php suivant :

<?php
    // we are redirected on this page with an URI transform from this type
   //  localhost/controlname/methodname/param	into
   //  localhost ?p=string 
   // where the p parameter contain the string « <controlname>/<methodname>/<param> »

$subject = $_GET[‘p’] ;
$pattern2 = ‘([a-z]+)\/([a-z]+)\/([a-z]+)’ ;
$pattern3 = ‘([a-z]+)\/([a-z]+)’ ;
if ( preg_match($pattern3, $subject, $matches) {
   $controllername = ucfirst($matches[1] ).’ctl’;
   $modelname = $matches[1].’mod’;
   $viewname = $matches[1] ;
   $method = $matches[2] ;
   $param = $matches[3] ;
      // instanciate controller with the help of php
   require_once(__DIR__. ‘/model/’. $modelname.’.php’) ;
   require_once(__DIR__. ‘/controller/’. $controllername.’.php’) ;
   $model = new $$modelname() ;
   $controller = new $$controllername($model, $viewname) ;
   // call the method with param
    call_user_func_array($controller->$method, array($param)) ;

}
elseif ( preg_match($pattern2, $subject, $matches) {
   $controllername = $matches[1] ;
   $method = $matches[2] ;
}

?>
