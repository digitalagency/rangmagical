<?php defined('BASEPATH') OR exit('No direct script access allowed');
define('SITEROOTFB',base_url().'facebook');
/**
 * Admin Home_model Model
 * @package Model
 * @subpackage Model
 * Date created:January 31, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Home_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function function_name($argument1,$argument2){

    }

    public function getPattern()
    {
    	$this->db->select('id,pattern,shades');
        $this->db->order_by("id","ASC");
        $query =  $this->db->get('tbl_pattern');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function getPattern_by_shade($shades)
    {
        $this->db->select('id,pattern');
        $this->db->where('shades',$shades);
        $this->db->where('display','1');
        $this->db->order_by("pattern","ASC");
        $query =  $this->db->get('tbl_pattern');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function getTopusers_by_regioncode($regioncode)
    {
        $this->db->select('tp.id id,tp.likes,tp.imagepath,tp.imagename,tu.full_name');
        $this->db->from('tbl_photo tp');
        $this->db->join('tbl_user tu', 'tu.registration_number = tp.user_id');
        $this->db->like('tp.user_id',$regioncode,'after');
        $this->db->where('tp.imagepath!=','');
        $this->db->where('tp.imagename!=','');
        $this->db->order_by("tp.likes","DESC");
        $this->db->limit(12);
        $query =  $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function getRegisteredusers_by_regioncode($regioncode)
    {
        $this->db->select('id,likes,imagepath,imagename');
        $this->db->like('user_id',$regioncode,'before');
        $this->db->where('imagepath!=','');
        $this->db->where('imagename!=','');
        $this->db->order_by("likes","DESC");
        $query =  $this->db->get('tbl_photo');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_uid_by_rp($registration_number,$passcode)
    {
        $this->db->select('id');
        $this->db->where('registration_number',$registration_number);
        $this->db->where('passcode',$passcode);
        $query =  $this->db->get('tbl_user');
        //echo $this->db->last_query();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            $val = $query->row();
            return $val->id;
        }

    }

    public function getSubregions_by_main_region($main_region)
    {
        $this->db->select('region');
        $this->db->from('tbl_regions');        
        $this->db->where('`parent_id` = (SELECT `id` FROM `tbl_regions` WHERE parent_id="0" AND region="'.$main_region.'")', NULL, FALSE);
        $this->db->order_by("region","ASC");
        $query =  $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        } 
    }

    public function selectbox_for_Subregions_by_main_region($main_region)
    {
        $this->db->select('region');
        $this->db->from('tbl_regions');        
        $this->db->where('`parent_id` = (SELECT `id` FROM `tbl_regions` WHERE parent_id="0" AND region="'.$main_region.'")', NULL, FALSE);
        $this->db->order_by("region","ASC");
        $query =  $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            $selectbox = '
            <select name="sub_region" id="sub_region" class="form-control">
                <option value="">Select sub region</option>
            ';
            $subregion = $query->result();
            foreach($subregion as $key=>$value)
            {
            $selectbox = '
                <option value="'.$value->region.'">'.$value->region.'</option>
                ';
            }

            $selectbox .= '
            </select>
            ';
            echo $selectbox;
        } 
    }

    public function getSerialnumber($regioncode)
    {
        $this->db->select('serial_number');
        $this->db->like('user_id',$regioncode,'after');
        $this->db->order_by('serial_number','DESC');
        $this->db->limit(1);
        $query =  $this->db->get('tbl_photo'); 
        //echo $this->db->last_query();
        if ($query->num_rows() == 0) {
            return 1;
        } else {
            $val = $query->row();

            $serialNumber = $val->serial_number;
            return ($serialNumber+1);
        }
    }

    public function getRegion($regno)
    {        
        $regno_arr = explode('-',$regno);
        $area = $regno_arr['1'];
        $region_arr = array('K'=>'kathmandu','P'=>'pokhara','C'=>'central','E'=>'eastern','W'=>'western','COM'=>'commercial');
        return $region_arr[$area];
    }

    function uploadPhoto($no_of_coupon,$coupon_no,$imagepath,$imagename,$medium)
    {
        $registration_number = strtoupper($this->input->post('regno'));
        $reg_arr = explode('-',$registration_number);
        //print_r($reg_arr);
        $regioncode = $reg_arr['0'].'-'.$reg_arr['1'];
        $serialNumber = $this->getSerialnumber($regioncode);
        //echo 'serialNumber = '.$serialNumber;
        $data = array(
            'registration_date' => date('Y-m-d'),
            'full_name' => $this->input->post('fname'),
            'main_region' => $this->input->post('main_region'),
            'sub_region' => $this->input->post('sub_region'),
            'coupon_qty' => $no_of_coupon,
            'coupon_no' => $coupon_no,
            'shade' => $this->input->post('shade'),
            'pattern' => $this->input->post('pattern'),
            'medium' => $medium
        );

        $data2 = array(
            'serial_number' => $serialNumber,
            'user_id' => $registration_number,
            'imagepath' => $imagepath,
            'imagename' => $imagename
        );

        $photo_id_prev = $this->checkPrevious($registration_number);
        if($photo_id_prev==0)
        {   
            //Update user table
            $this->db->where('registration_number', $registration_number);
            $this->db->update('tbl_user', $data); 

            //Insert in Photo table
            $this->db->insert('tbl_photo', $data2);
            return $this->db->insert_id();
        }
        else
            return $photo_id_prev;
    }

    public function checkPrevious($regno)
    {
        $this->db->select('id');
        $this->db->where('user_id',$regno);
        $query =  $this->db->get('tbl_photo');
        if ($query->num_rows() == 0) {
            return 0;
        } else {
            $val = $query->row();
            $photo_id = $val->id;
            return $photo_id;
        }
    }

    public function getGift($regno)
    {
        $this->db->select('prize_image,coupon_code,prize_details');
        $this->db->where('user_id',$regno);
        $query =  $this->db->get('tbl_coupon');
        if ($query->num_rows() == 0) {
            return 0;
        } else {
            $val = $query->row();
            $prize_image = $val->prize_image;
            $coupon_code = $val->coupon_code;
            $prize_details = $val->prize_details;

            return $prize_image.'___'.$coupon_code.'___'.$prize_details;
        }
    }

    public function getRandomCoupon($n)
    {
        $this->db->order_by('rand()');
        $this->db->where('coupon_status','0');
        $this->db->limit($n);
        $query = $this->db->get('tbl_coupon');
        return $query->result_array();
    } 

    public function isRegistered($regno)
    {
        
    }

    public function updateCouponstatus($ecoupon,$user_id)
    {
        $data = array(
            'coupon_status' => '1',
            'user_id' => $user_id
        );
        $this->db->where('coupon_code', $ecoupon);
        $this->db->update('tbl_coupon', $data); 
    }
}

/* End of file Home_model.php
 * Location: ./application/modules/home/models/Home_model.php */
