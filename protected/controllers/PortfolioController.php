<?php
define('INDEX',     0);
define('WEDDING',   1);
define('PORTRAIT',  2);
define('KIDS',      3);
define('KIDS_BABY',  4);
define('KIDS_1_3',   5);
define('KIDS_3_13',  6);
define('FAMILY',    7);
define('DIFFERENT', 8);

/**
 * Created by JetBrains PhpStorm.
 * User: grishin
 * Date: 31.10.12
 * Time: 11:11
 * To change this template use File | Settings | File Templates.
 */
class PortfolioController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    } // actions() ???

    public function  actionIndex()
    {
        $this->render('index', array('category' => INDEX));
    } // actionIndex

    public function actionWeddings()
    {
        $this->render('index', array('category' => WEDDING));
    } // actionWeddings

    public function actionPortraits()
    {
        $this->render('index', array('category' => PORTRAIT));
    } // actionPortraits

    public function  actionKids()
    {
        $this->render('index', array('category' => KIDS));
    } // actionKids

    public function  actionBabies()
    {
        $this->render('index', array('category' => KID_BABY));
    } // actionBabies

    public function  actionOneThree()
    {
        $this->render('index', array('category' => KIDS_1_3));
    } // actionBabies

    public function  actionThreeUp()
    {
        $this->render('index', array('category' => KIDS_3_13));
    } // actionBabies

    public function actionFamily()
    {
        $this->render('index', array('category' => FAMILY));
    } // actionFamily

    public function actionDifferent()
    {
        $this->render('index', array('category' => DIFFERENT));
    } // actionDifferent
} // class PortfolioController
