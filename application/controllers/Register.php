<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	@author 	: AIYASH AHMED
 *	date		: 20 january, 2024
 *	SIgnetBD
 *	aiyashahmed96@gmail.com
 */

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    function teacher_register()
    {
        $data['name'] = $this->input->post('name');
        $data['birthday'] = $this->input->post('birthday');
        $data['sex'] = $this->input->post('sex');
        $data['address'] = $this->input->post('address');
        $data['phone'] = $this->input->post('phone');
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $table = 'teacher';

        // email and phone validation
        $email_validate = $this->email_validatation($table, $email);
        $phone_validation = $this->phone_validatation($table, $this->input->post('phone'));
        if ($email_validate['validation_error']) {
            $response = $email_validate['response'];
        } else if ($phone_validation['validation_error']) {
            $response = $phone_validation['response'];
        } else {
            $this->db->insert($table, $data);
            $teacher_id = $this->db->insert_id();
            // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $teacher_id . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            $this->email_model->account_opening_email($table, $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL

            $message = "Registered!";

            if ($teacher_id) {
                $this->validate_login($email, $password);
            }

            $response = [
                'status' => 'success',
                'message' => $message,
            ];

        }
        echo json_encode($response);
    }

    function parent_register()
    {
        $data['name'] = $this->input->post('name');
        $data['profession'] = $this->input->post('profession');
        $data['address'] = $this->input->post('address');
        $data['phone'] = $this->input->post('phone');
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $table = 'parent';

        // email and phone validation
        $email_validate = $this->email_validatation($table, $email);
        $phone_validation = $this->phone_validatation($table, $this->input->post('phone'));

        if ($email_validate['validation_error']) {
            $response = $email_validate['response'];
        } else if ($phone_validation['validation_error']) {
            $response = $phone_validation['response'];
        } else {
            $this->db->insert($table, $data);
            $parent_id = $this->db->insert_id();
            // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $teacher_id . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            $this->email_model->account_opening_email($table, $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL

            $message = "Registered!";

            if ($parent_id) {
                $this->validate_login($email, $password);
            }

            $response = [
                'status' => 'success',
                'message' => $message,
            ];

        }
        echo json_encode($response);
    }

    function email_validatation($table, $email)
    {
        $emailExists = $this->db->get_where($table, array("email" => $email));

        $response = [
            'status' => 'failed',
            'message' => "This email has already been taken!",
        ];

        if ($emailExists->num_rows() > 0)
            return ['validation_error' => true, 'response' => $response];
        else
            return ['validation_error' => false];
    }

    function phone_validatation($table, $phone)
    {
        $phoneExists = $this->db->get_where($table, array("phone" => $phone));

        $response = [
            'status' => 'failed',
            'message' => "This phone has already been taken!",
        ];

        if ($phoneExists->num_rows() > 0)
            return ['validation_error' => true, 'response' => $response];
        else
            return ['validation_error' => false];
    }

    function validate_login($email = '', $password = '')
    {
        $credential = array('email' => $email, 'password' => $password);

        // Checking login credential for teacher
        $query = $this->db->get_where('teacher', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('teacher_login', '1');
            $this->session->set_userdata('teacher_id', $row->teacher_id);
            $this->session->set_userdata('login_user_id', $row->teacher_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'teacher');
            return 'success';
        }

        // Checking login credential for parent
        $query = $this->db->get_where('parent', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('parent_login', '1');
            $this->session->set_userdata('parent_id', $row->parent_id);
            $this->session->set_userdata('login_user_id', $row->parent_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'parent');
            return 'success';
        }

        return 'invalid';
    }
}

?>