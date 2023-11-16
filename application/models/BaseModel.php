<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getQuery($query = NULL) {
        try {
            if ($query === NULL) {
                return NULL;
            } else {
                return $this->db->query($query);
            }
        } catch (Exception $e) {
            // Handle the exception, e.g., log the error or throw a custom exception
            return NULL;
        }
    }

    public function getData($tbl_name, $cond = NULL, $order_columns = [], $order_direction = 'DESC', $lim = NULL) {
        try {
            if ($cond !== NULL) {
                $this->db->where($cond);
            }
            if (!empty($order_columns) && is_array($order_columns)) {
                foreach ($order_columns as $column) {
                    $this->db->order_by($column, $order_direction);
                }
            }
            if ($lim !== NULL) {
                $this->db->limit($lim);
            }
            return $this->db->get($tbl_name);
        } catch (Exception $e) {
            // Handle the exception, e.g., log the error or throw a custom exception
            return NULL;
        }
    }
    
    

    public function updateData($tbl_name, $data, $cond = NULL) {
        try {
            if ($cond !== NULL) {
                $this->db->where($cond);
                return $this->db->update($tbl_name, $data);
            } else {
                return -1;
            }
        } catch (Exception $e) {
            // Handle the exception, e.g., log the error or throw a custom exception
            return -1;
        }
    }

    public function insertData($tbl_name, $data) {
        try {
            return $this->db->insert($tbl_name, $data);
        } catch (Exception $e) {
            // Handle the exception, e.g., log the error or throw a custom exception
            return false;
        }
    }

    public function deleteData($tbl_name, $cond = NULL) {
        try {
            if ($cond !== NULL) {
                $this->db->where($cond);
            }
            return $this->db->delete($tbl_name);
        } catch (Exception $e) {
            // Handle the exception, e.g., log the error or throw a custom exception
            return false;
        }
    }

    public function likeData($tbl_name, $like = NULL) {
        try {
            if ($like !== NULL) {
                $this->db->like($like);
            }
            return $this->db->get($tbl_name);
        } catch (Exception $e) {
            // Handle the exception, e.g., log the error or throw a custom exception
            return NULL;
        }
    }

    public function getJoinData($tbl1, $tbl2, $joinCond, $order = NULL) {
        try {
            $this->db->select('*,' . $tbl1 . '.Id as ID');
            $this->db->from($tbl1);
            $this->db->join($tbl2, $joinCond);
            if ($order !== NULL) {
                $this->db->order_by($order, 'DESC');
            }
            return $this->db->get();
        } catch (Exception $e) {
            // Handle the exception, e.g., log the error or throw a custom exception
            return NULL;
        }
    }

    public function downloadFile($cond) {
        try {
            $this->db->select('*');
            $this->db->from('upload');
            $this->db->join('menu_master', 'upload.menu_id = menu_master.id', 'left');
            $this->db->where($cond);
            return $this->db->get();
        } catch (Exception $e) {
            // Handle the exception, e.g., log the error or throw a custom exception
            return NULL;
        }
    }

    public function insertVisitor($ipAddress, $userAgent) {
        $data = array(
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'timestamp' => date('Y-m-d H:i:s')
        );
        $this->db->insert('visitors', $data);
    }

    public function isUniqueVisitor($ipAddress, $userAgent) {
        $this->db->where('ip_address', $ipAddress);
        $this->db->where('user_agent', $userAgent);
        $query = $this->db->get('visitors');
        return $query->num_rows() == 0;
    }

    // public function getMenusWithPageContent() {
    //     $this->db->select('menu_master.id, menu_master.menu_name');
    //     $this->db->from('menu_master');
    //     $this->db->join('page_content', 'menu_master.id = page_content.menu_id', 'left');
    //     $this->db->where(['menu_master.parent_menu !='=> 0, 'menu_master.status'=>1 , 'menu_master.is_enabled'=>1, 'menu_master.page_created'=>0]);
    //     $query = $this->db->get();
    //     if ($query) {
    //         return $query;
    //     } else {
    //         return array(); 
    //     }
    // }
    public function getAppointmentDetail($where = null)
    {
        $this->db->select('*');
        $this->db->from('form_status');
        $this->db->join('form1', 'form_status.user_id = form1.user_id', 'left');
        $this->db->join('form2', 'form_status.user_id = form2.user_id', 'left');
        $this->db->join('form3', 'form_status.user_id = form3.user_id', 'left');
        $this->db->join('login', 'form_status.user_id = login.UserId', 'left');
        $this->db->order_by('create_datetime', 'DESC');
        if ($where !== null) {
            $this->db->where('form_status.application_status', $where);
        }
    
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function getApplicationPreview($where)
{
    $this->db->select('*');
    $this->db->from('form_status');
    $this->db->join('form1', 'form_status.user_id = form1.user_id', 'left');
    $this->db->join('form2', 'form_status.user_id = form2.user_id', 'left');
    $this->db->join('form3', 'form_status.user_id = form3.user_id', 'left');
    $this->db->join('login', 'form_status.user_id = login.UserId', 'left');
    if ($where !== null) {
        $this->db->where('form_status.user_id', $where); 
    }

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query;
    } else {
        return array();
    }
}
    public function getMenusWithPageContent() {
        $this->db->select('menu_master.id, menu_master.menu_name');
        $this->db->where(['menu_master.page_created'=> 0]);
        $query = $this->db->get('menu_master');
        if ($query) {
            return $query;
        } else {
            return array(); 
        }
    }
}
