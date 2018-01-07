<?php

    try
    {
        $GLOBALS['bddL7C13'] = new PDO('mysql:host=localhost;dbname=swaps;charset=utf8', 'root', '');
        $GLOBALS['bddL7C13']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
   
    try
    {
       $GLOBALS['bdd'] = new PDO('mysql:host=localhost;dbname=swaps2;charset=utf8', 'root', '');
       $GLOBALS['bdd']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e)
    {
       die('Erreur : '.$e->getMessage());
    }
