<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/3
 * Time: 16:51
 */

namespace Admin\Controller;


use Common\Controller\AdminbaseController;

class SettlementController extends AdminbaseController
{
    /**
     * ��������
     */
    public function index(){
        $this->display();
    }

    /**
     * �����˽���
     */
    public function calculate(){
        $this->display();
    }

}