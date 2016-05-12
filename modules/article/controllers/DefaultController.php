<?php

namespace psudev\dbmodules\modules\article\controllers;

use psudev\dbmudules\components\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
