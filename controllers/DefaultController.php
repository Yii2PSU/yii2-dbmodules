<?php

namespace psudev\dbmodules\controllers;

use psudev\dbmodules\components\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
