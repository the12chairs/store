<?php

class DefaultController extends Controller {


    public function actionIndex() {
		$adminModel = new Goods;
        $this->render('index', array(
            'model'=>$adminModel,));
	}

}