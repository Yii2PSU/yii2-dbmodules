<?php

namespace psudev\dbmodules\controllers;

use psudev\dbmudules\components\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
