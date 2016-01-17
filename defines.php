<?php
    define('DS', DIRECTORY_SEPARATOR);
    define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT']. DS . 'php'. DS . 'programming' . DS . 'projects' . DS . 'commentbox' . DS);

    define('INCLUDES', DOC_ROOT . 'includes'. DS);

    define('SQL_DIR', DOC_ROOT . 'sql' . DS );
    define('MODELS_DIR', DOC_ROOT . 'sql' . DS . 'models' . DS);

    require_once SQL_DIR . 'connect.php';
?>