<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*** Admin Controller
 * @package Controller
 * @subpackage Controller
 * Date created:January 23, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */

class Dashboard extends MY_Controller {



    public function __construct() {

        parent::__construct();

        $this->load->model('general_model');

    }

   

    function index() {

        $data['title'] = 'Berger Paints :: Rang Magical Consumer Scheme';

        $data['page_header'] = 'Dashboard';

        $data['page_header_icone'] = 'fa-home';

        $data['main'] = 'dashboard_view';

        $data['parent_nav'] = '';

        $data['nav'] = 'dashboard';

        $data['total_registered_users'] = $this->general_model->countTotal('tbl_photo');

        $data['total_registration_numbers'] = $this->general_model->countTotal('tbl_user');

        $data['total_gift_coupons'] = $this->general_model->countTotal('tbl_coupon');

        $data['gift_coupons_taken'] = $this->general_model->countTotal('tbl_coupon',array('coupon_status'=>'1'));      

        if(!isset($this->session->lang))

        {            

            $the_session = array("lang" => '1');

            $this -> session -> set_userdata($the_session);

        }



        $this->load->view('home', $data);

    }



    function setLang($lang)

    {

        $the_session = array("lang" => $lang);

        $this -> session -> set_userdata($the_session);

        redirect(base_url() . 'admin/Dashboard');

    }



}



/* End of file dashboard.php

 * Location: ./application/modules/admin/controllers/dashboard.php */