<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * ZBV2OA
 *
 * 一款基于CodeIgniter框架的开源轻型办公系统.
 *
 * @package     ZBV2OA
 * @author      Binarx
 * @copyright   Copyright (c) 2012, Binarx.
 * @link        http://www.zbv2.com
 * @since       Version 1.0
 */
// ------------------------------------------------------------------------

/**
 * ZBV2OA 客户操作模型
 * @author      Binarx
 */
class Customer_m extends CI_Model {

    /**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // ------------------------------------------------------------------------
    /**
     * 根据指定信息获取客户信息
     *
     * @access  public
     * @param   int
     * @param   int
     * @param   string
     * @return  object
     */
    public function get_customers($limit = 0, $offset = 0, $district = '', $user_id = 0, $status = '', $from_id = 0) {
        if ($district) {
            $this->db->like('district_detail', $district);
            $this->db->or_like('address', $district);
        }
        if ($user_id) {
            $this->db->where('zb_customer.user_id', $user_id);
        }
        if ($from_id) {
            $this->db->where('zb_customer.from_id', $from_id);
        }
        if ($status) {
            $str = 'and ' . $status;
        }
        if ($limit) {
            $this->db->limit($limit);
        }
        if ($offset) {
            $this->db->offset($offset);
        }
        return $this->db->select('customer_id,customer_name,tel,address,from_name,from_detail,status_name,channel,brand,intention,company')
                        ->join("zb_customer_from", "zb_customer.from_id = zb_customer_from.from_id")
                        ->join("zb_customer_status", "zb_customer.status_id = zb_customer_status.status_id $str")
                        ->order_by('zb_customer.status_id')
                        ->get('zb_customer')
                        ->result();
    }

    // ------------------------------------------------------------------------

    /**
     * 根据指定信息获取客户信息
     *
     * @access  public
     * @param   int
     * @param   int
     * @param   string
     * @return  object
     */
    public function check_customers($limit = 0, $offset = 0, $district = '', $user_id = 0, $status_id = 0, $from_id = 0, $class_id = 0, $level_id = 0, $district_level = 0, $customer_name = '', $tel = '', $address = '', $channel = '', $brand = '', $company = '') {
        if ($district) {
            $this->db->like('district_detail', $district);
        }
        if ($user_id) {
            $this->db->where('zb_customer.user_id', $user_id);
        }
        if ($from_id) {
            $this->db->where('zb_customer.from_id', $from_id);
        }
        if ($status_id) {
            $this->db->where('zb_customer.status_id', $status_id);
        }
        if ($class_id) {
            $this->db->where('zb_customer.class_id', $class_id);
        }
        if ($level_id) {
            $this->db->where('zb_customer.level_id', $level_id);
        }
        if ($district_level) {
            $this->db->where('zb_customer.district_level', $district_level);
        }
        if ($customer_name) {
            $this->db->like('zb_customer.customer_name', $customer_name);
        }
        if ($tel) {
            $this->db->like('zb_customer.tel', $tel);
        }
        if ($address) {
            $this->db->like('zb_customer.address', $address);
        }
        if ($channel) {
            $this->db->like('zb_customer.channel', $channel);
        }
        if ($brand) {
            $this->db->like('zb_customer.brand', $brand);
        }
        if ($company) {
            $this->db->like('zb_customer.company', $company);
        }
        if ($limit) {
            $this->db->limit($limit);
        }
        if ($offset) {
            $this->db->offset($offset);
        }
        return $this->db->select('customer_id,customer_name,tel,address,from_name,from_detail,status_name,channel,brand,intention,company')
                        ->join("zb_customer_from", "zb_customer.from_id = zb_customer_from.from_id")
                        ->join("zb_customer_status", "zb_customer.status_id = zb_customer_status.status_id and zb_customer_status.status_stage !=0")
                        ->order_by('zb_customer.status_id')
                        ->get('zb_customer')
                        ->result();
    }

    // ------------------------------------------------------------------------

    /**
     * 获取指定客户总数
     *
     * @access  public
     * @return  object
     */
    public function check_customers_num($district = '', $user_id = 0, $status_id = 0, $from_id = 0, $class_id = 0, $level_id = 0, $district_level = 0, $customer_name = '', $tel = '', $address = '', $channel = '', $brand = '', $company = '') {
        if ($district) {
            $this->db->like('district_detail', $district);
        }
        if ($user_id) {
            $this->db->where('zb_customer.user_id', $user_id);
        }
        if ($from_id) {
            $this->db->where('zb_customer.from_id', $from_id);
        }
        if ($status_id) {
            $this->db->where('zb_customer.status_id', $status_id);
        }
        if ($class_id) {
            $this->db->where('zb_customer.class_id', $class_id);
        }
        if ($level_id) {
            $this->db->where('zb_customer.level_id', $level_id);
        }
        if ($district_level) {
            $this->db->where('zb_customer.district_level', $district_level);
        }
        if ($customer_name) {
            $this->db->like('zb_customer.customer_name', $customer_name);
        }
        if ($tel) {
            $this->db->like('zb_customer.tel', $tel);
        }
        if ($address) {
            $this->db->like('zb_customer.address', $address);
        }
        if ($channel) {
            $this->db->like('zb_customer.channel', $channel);
        }
        if ($brand) {
            $this->db->like('zb_customer.brand', $brand);
        }
        if ($company) {
            $this->db->like('zb_customer.company', $company);
        }
        return $this->db->join("zb_customer_status", "zb_customer.status_id = zb_customer_status.status_id and zb_customer_status.status_stage !=0")
                        ->count_all_results('zb_customer');
    }

    // ------------------------------------------------------------------------

    /**
     * 获取指定客户总数
     *
     * @access  public
     * @return  int
     */
    public function get_customers_num($district = '', $user_id = 0, $status = '', $from_id = 0) {
        if ($user_id) {
            $this->db->where('zb_customer.user_id', $user_id);
        }
        if ($district) {
            $this->db->like('district_detail', $district);
        }
        if ($status) {
            $str = 'and ' . $status;
        }
        if ($from_id) {
            $this->db->where('zb_customer.from_id', $from_id);
        }
        return $this->db->join('zb_customer_status', "zb_customer.status_id = zb_customer_status.status_id $str")
                        ->count_all_results('zb_customer');
    }

    // ------------------------------------------------------------------------

    /**
     * 根据ID获取指定客户
     *
     * @access  public
     * @return  int
     */
    public function get_customer_by_id($customer_id = 0) {
        return $this->db->where('customer_id', $customer_id)
                        ->join('zb_customer_from', 'zb_customer.from_id = zb_customer_from.from_id', 'left')
                        ->join('zb_customer_status', 'zb_customer.status_id = zb_customer_status.status_id', 'left')
                        ->get('zb_customer')
                        ->row_array();
    }

    // ------------------------------------------------------------------------

    /**
     * 添加客户信息
     *
     * @access  public
     * @param   array
     * @return  bool
     */
    public function add_customer($data) {
        $this->db->insert('zb_customer', $data);
        return $this->db->insert_id();
    }

    // ------------------------------------------------------------------------

    /**
     * 更改客户负责人
     *
     * @access  public
     * @param   array
     * @return  bool
     */
    public function allot_customer($customer_arr, $data) {
        foreach ($customer_arr as $key) {
            return $this->db->where('customer_id', $key)->update('zb_customer', $data);
        }
    }

    // ------------------------------------------------------------------------

    /**
     * 修改客户信息
     *
     * @access  public
     * @param   int
     * @param   array
     * @return  bool
     */
    public function edit_customer($id, $data) {
        return $this->db->where('customer_id', $id)->update('zb_customer', $data);
    }

    // ------------------------------------------------------------------------

    /**
     * 根据状态ID获取状态信息
     *
     * @access  public
     * @param   int
     * @return  object
     */
    // public function get_status_by_id($id) {
//        return $this->db->where('status_id', $id)->get('zb_customer_status')->row();
    // }
    // ------------------------------------------------------------------------

    /**
     * 删除状态
     *
     * @access  public
     * @param   int
     * @return  bool
     */
    // public function del_status($id) {
//        return $this->db->where('status_id', $id)->delete('zb_customer_status');
    // }
    // ------------------------------------------------------------------------

    /**
     * 获取状态下的客户数
     *
     * @access  public
     * @param   int
     * @return  bool
     */
    // public function get_status_user_num($id) {
//        return $this->db->where('customer_id', $id)->count_all_results('zb_customer');
    // }
    // ------------------------------------------------------------------------

    /**
     * 获取地区数据
     *
     * @access  public
     * @param   int
     * @return  bool
     */
    public function get_district($level = 0, $id = 0) {
        if ($id) {
            $this->db->where('upid', $id);
        }
        return $this->db->where('level', $level)
                        ->get('zb_district')
                        ->result();
    }

    // ------------------------------------------------------------------------
}

/* End of file customer_status_m.php */
/* Location: ./application/models/customer_status_m.php */