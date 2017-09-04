<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home Controller
 * @package Controller
 * @subpackage Controller
 * Date created:January 31, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Home extends View_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->helper("view_helper");
        $this->load->model('admin/general_model','general_model');
    }

    function index() {    
        $data['menu'] = 'home';
        $data['page_title'] = '.:: Berger Paints Nepal :: ';
        $data['main'] = 'home';
        $this->load->view('main',$data);
    }

    function terms_and_condition()
    {        
        $data['menu'] = 'terms';
        $data['page_title'] = '.:: Berger Paints Nepal :: ';
        $data['main'] = 'terms_and_condition';
        $this->load->view('main',$data);
    }

    function upload_procedure()
    {        
        $data['menu'] = 'procedure';
        $data['page_title'] = '.:: Berger Paints Nepal :: ';
        $data['main'] = 'upload_procedure';
        $this->load->view('main',$data);
    }

    function photo_upload()
    {        
        $data['menu'] = 'register';
        $data['page_title'] = '.:: Berger Paints Nepal :: ';           
        $data['metallica'] = $this->home_model->getPattern_by_shade('Metallica');
        $data['nonmetallica'] = $this->home_model->getPattern_by_shade('Non - metallica');

        $data['main'] = 'photo_upload';
        $this->load->view('main',$data);
    }

    function photo_upload_process()
    {        
        $data['menu'] = 'register';
        $data['page_title'] = '.:: Berger Paints Nepal :: ';           
        $data['metallica'] = $this->home_model->getPattern_by_shade('Metallica');
        $data['nonmetallica'] = $this->home_model->getPattern_by_shade('Non - metallica');
        //print_r($_POST);

        $regno = strtoupper($_POST['regno']);
        $region = $this->home_model->getRegion($regno);
        $passcode = $_POST['passcode'];
        $isRegistered = $this->home_model->checkPrevious($regno);
        $uid = $this->home_model->get_uid_by_rp($regno,$passcode); //the value of uid becomes null if the registration number doesnt exist.
        
        //Count Coupons and assign coupon_no    
        $no_of_coupon=0;
        $qx_text="XP";
        $qx_count=0;
        $coupon_no = '';
        for ($cnt=0;$cnt<count($_POST['couponumber']);$cnt++)
        {
          //echo $cnt." --> ".$_POST['couponumber'][$cnt];
          //echo "<br>";
          if(!empty($_POST['couponumber'][$cnt]))
          {
            ++$no_of_coupon;
            $coupon_no.=$_POST['couponumber'][$cnt].', ';
            $couponumber = strtoupper($_POST['couponumber'][$cnt]);
            if (strpos($couponumber, $qx_text) !== false) {
                ++$qx_count;
            }
          }
        }
        //echo $no_of_coupon;

        $couponumber_1 = $_POST['couponumber']['0'];
        
        if(!empty($isRegistered)){
            $message = "You have already registered with the registration number " . $regno . ".";
        } 
        else if ($uid == '') {
            $message = "The Registration number " . $regno . " and passcode combination doesnt match.";
        } 
        else if ($couponumber_1 == '') {
            $message = "You must enter your coupon number to participate in Rang Magical consumer scheme.";
        }
        else if($no_of_coupon<3)
        {
            $message = "You must enter at least three coupon numbers to participate in Rang Magical consumer scheme.";
        }
        //echo $message;
        $this->form_validation->set_rules('fname', 'Full Name', 'required');
        $this->form_validation->set_rules('regno', 'Registration Number', 'required');
        $this->form_validation->set_rules('passcode', 'Passcode', 'required');
        
        if (empty($_FILES['houseimage']['name']))
        {
            $this->form_validation->set_rules('houseimage', 'House Image', 'required');
        }

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('success', validation_errors());
            $data['metallica'] = $this->home_model->getPattern_by_shade('Metallica');
            $data['nonmetallica'] = $this->home_model->getPattern_by_shade('Non - metallica');
            $data['main'] = 'photo_upload';
            $this->load->view('main',$data);
        }
        elseif(!empty($message))
        {            
            $data['metallica'] = $this->home_model->getPattern_by_shade('Metallica');
            $data['nonmetallica'] = $this->home_model->getPattern_by_shade('Non - metallica');
            $this->session->set_flashdata('success', $message);
            $data['main'] = 'photo_upload';
            $this->load->view('main',$data);
        }
        else
        {            
            $houseimage = $_FILES['houseimage']['name'];
            if ($houseimage !== "") {
                $ext = pathinfo($_FILES['houseimage']['name'], PATHINFO_EXTENSION); 
                $imagepath = 'uploads/'.date('Y').'/'.$region.'/';
                $imagename = $regno.'.'.$ext;
                $config1['upload_path'] = FCPATH.$imagepath;
                $config1['log_threshold'] = 1;
                //$config1['allowed_types'] = 'doc|docx|pdf|txt|rtf';
                $config1['allowed_types'] = 'jpg|jpeg|png|bmp';
                $config1['max_size'] = '100000'; // 0 = no file size limit
                $config1['file_name'] = $imagename;
                $config1['overwrite'] = true;
                //print_r($config1);
                $this->load->library('upload', $config1);
                $this->upload->do_upload('houseimage');
                $upload_data1 = $this->upload->data();
                $houseimage = $upload_data1['file_name'];
            }

            $photo_id = $this->home_model->uploadPhoto($no_of_coupon,$coupon_no,$imagepath,$imagename,'website');
            //echo $qx_count;
            if($qx_count>=3) //if entered coupon code is liable for gift voucher
            {                
                $data['regno'] = $regno;
                $data['ecoupon'] = $this->home_model->getRandomCoupon(12);
                $data['main'] = 'e_coupon';
                $this->load->view('main',$data);
            }
            else //if entered coupon code is NOT liable for gift voucher
            {
                //echo "Thank you";
                redirect(base_url() . 'thank-you');
            }
        }
    }

    function photo_album()
    {        
        $data['menu'] = 'album';
        $data['page_title'] = '.:: Berger Paints Nepal :: ';
        $data['main'] = 'photo_album';
        $this->load->view('main',$data);
    }

    function photo_gallery_top()
    {        
        $data['menu'] = 'album';
        $data['page_title'] = '.:: Berger Paints Nepal :: ';
        $data['main'] = 'photo_gallery_top';
        $this->load->view('main',$data);
    }

    function thank_you()
    {
        $data['menu'] = 'register';
        $data['page_title'] = '.:: Berger Paints Nepal :: ';
        $data['regno'] = $this->uri->segment('2');
        $data['main'] = 'thank_you';
        $this->load->view('main',$data);
    }

    function showSubregion()
    {
        $main_region = $this->uri->segment(3);
        $class = $this->uri->segment(4);
        if(empty($class))
            $class = 'form-control';
        $subregion = $this->home_model->getSubregions_by_main_region($main_region);
        
        $required = '';
        if($subregion)
            $required = 'required';
        $selectbox = '
        <select name="sub_region" id="sub_region" class="'.$class.'" '.$required.'>
            <option value="">Select sub region</option>
        ';
        if($subregion)
        {
            foreach($subregion as $key=>$value)
            {
            $selectbox .= '
                <option value="'.$value->region.'">'.$value->region.'</option>
                ';
            }
        }
        $selectbox .= '
        </select>
        ';
        echo $selectbox;
    }

    function ecoupon_process($ecoupon,$regno)
    {
        $this->home_model->updateCouponstatus($ecoupon,$regno);
        redirect(base_url() . 'thank-you/'.$regno);
    }

    function updatePatternname() {    
        $data['menu'] = 'home';
        $data['page_title'] = '.:: Berger Paints Nepal :: ';
        $data['main'] = 'home';
        $pattern = $this->home_model->getPattern();
        foreach($pattern as $key=>$value)
        {
            $id = $value->id;
            $shades = strtolower($value->shades);
            $shades = str_replace(' - ','',$shades);
            $pattern = $value->pattern;
            $new_name = strtolower($pattern);
            $new_name = str_replace(' ','_',$new_name);
            $new_name = str_replace('-','_',$new_name);
            $this->home_model->updatePattern($id,$new_name);
            $path = FCPATH;
            echo $oldpath = $path.'content_home\images'.'\\'.$shades."\\"."large"."\\".$pattern;
            echo "<br>";
            echo $newpath = $path.'content_home\images'.'\\'.$shades."\\"."large"."\\".$new_name;
            echo "<br>";
            echo $oldpath2 = $path.'content_home\images'.'\\'.$shades."\\".$pattern;
            echo "<br>";
            echo $newpath2 = $path.'content_home\images'.'\\'.$shades."\\".$new_name;
            echo "<br>";echo "<br>";
            @rename($oldpath, $newpath);
            @rename($oldpath2, $newpath2);
        }

        //$this->load->view('main',$data);
    }
}

/* End of file Home.php
 * Location: ./application/modules/home/controllers/home.php */
