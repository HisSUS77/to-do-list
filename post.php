<?php
spl_autoload_register(function ($class){
    require_once($class.'.class.php');
});

$taskM = new taskManager;

if (isset($_POST)) {
    $taskM->setId($_POST['id']);
    $taskM->verifTask($_POST['product']);
}
?>;


?>