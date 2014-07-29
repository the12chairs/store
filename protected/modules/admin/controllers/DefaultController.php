<?php

class DefaultController extends Controller {


    public function actionIndex() {
		$adminModel = new Categories;
        $this->render('index', array(
            'model'=>$adminModel,));
	}

}