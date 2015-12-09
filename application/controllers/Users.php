<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model', 'users');
        $this->load->model('Document_model', 'document');
        $this->load->model('Other_model', 'other');
        $this->load->model('Offices_model', 'offices');
        $this->load->model('Compliance_model', 'compliance');
    }

    public function index() {
        if ($this->session->userdata('logged_in') == TRUE) {
            if ($this->session->userdata('user_type') == 1) {
                redirect('Users/adminDashboard');
            } else {
                redirect('Users/courierDashboard');
            }
        } else {
            $this->load->view('index');
        }
    }

    public function user_login() {
        $data = $this->input->post();
        if ($data['username'] == null || $data['password'] == null) {
            echo 'please enter the required fields.';
        } else {
            $data['password'] = hash('sha512', $data['password']);
            $data2 = $this->users->getUser($data['username'], $data['password']);
            if (!$data2) {
                echo "Username and Password are incorrect.";
            } else {
                foreach ($data2 as $key => $value) {
                    $user_id = $value->user_id;
                    $user = $value->user_name;
                    $pass = $value->password;
                    $type = $value->user_type_id;
                }
                $d = $this->users->getUserName($user_id);
                foreach ($d as $key => $value) {
                    $name = $value->first_name." ".$value->last_name;
                }
                if ($type == 1) {
                    $credentials = array(
                        'user_id' => $user_id,
                        'user_name' => $user,
                        'name' => $name,
                        'logged_in' => TRUE,
                        'user_type' => $type
                    );
                    $this->session->set_userdata($credentials);
                    redirect('Users/adminDashboard');
                } else {
                    $credentials = array(
                        'user_id' => $user_id,
                        'user_name' => $user,
                        'logged_in' => TRUE,
                        'user_type' => $type
                    );
                    $this->session->set_userdata($credentials);
                    redirect('Users/courierDashboard');
                }
            }
        }
    }

    public function adminDashboard() {
      if ($this->session->userdata('logged_in') == null) {
            redirect('Users/index');
        } else {
            if ($this->session->userdata('user_type') == 2) {
                redirect('Users/courierDashboard');
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
            } else {
                $this->load->view('courierView/courier-dashboard');
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
                $this->load->view('adminView/addCourierForm', $data);
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

        $data = array(
            'message' => $this->session->flashdata('message')
        );

        if ($this->session->userdata('logged_in') == null) {
            redirect('Users/index');
        } else {
            if ($this->session->userdata('user_type') == 2) {
                redirect('Users/courierDashboard');
            } else {
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
        // if ($this->session->userdata('logged_in') == null) {
        //     redirect('Users/index');
        // } else {
        //     if ($this->session->userdata('user_type') == 2) {
        //         redirect('Users/courierDashboard');
        //     } else {
                $data = $this->input->post();
                $office = 0;
                for($x=0; $x<count($data["office"]);$x++) {
                    if($data["office"][$x]==13){
                        $office = 13;
                        break;
                    }    
                }
                if ($this->form_validation->run() == FALSE) {
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
                        'data2' => $data2
                        );
                    $this->load->view('adminView/addComplianceForm', $y);
                } 
                else if($office == 13 && $data["others"]==""){
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
                        'message' => "<p style='color: red;'>Others text field is required.</p>"
                        );
                    $this->load->view('adminView/addComplianceForm', $y);
                }else if ($office == 0 && $data["others"]!="") {
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
                        'message' => "<p style='color: red;'>Others is required to be checked.</p>"
                    );
                    $this->load->view('adminView/addComplianceForm', $y); 
                } else {
                    $confirm = $this->document->insertDocument($data);
                    if (!$confirm) {
                        echo "Monitoring failed.";
                    } else {
                        echo "Monitoring started successfully.";
                        redirect('Users/adminDashboard');
                    }
                }
            // }
        // }
    }

    public function editCourier($id) {

        $result = $this->input->post();

        $confirm = $this->users->updateUser($result, $id);
        if (!$confirm) {
            echo "Courier credentials update failed.";
        } else {
            redirect(base_url('Users/viewAdminUsers'), 'refresh');
        }
    }

    public function deleteCourier($id) {
        $confirm = $this->users->deleteUser($id);
        if (!$confirm) {
            $this->session->set_flashdata('message', "<div class='alert alert-dismissable'><i class='fa fa-times-circle fa-fw'></i>User deletion failed.</div>");
            redirect(base_url('Users/viewAdminUsers'), 'refresh');
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-success'><i class='fa fa-check fa-fw'></i> User successfully deleted.</div>");
            redirect(base_url('Users/viewAdminUsers'), 'refresh');
        }
    }

    public function complianceForm() {
        // if ($this->session->userdata('logged_in') == null) {
        //     redirect('Users/index');
        // } else {
        //     if ($this->session->userdata('user_type') == 2) {
        //         redirect('Users/courierDashboard');
        //     } else {
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
                if($doc_id==null){
                    $doc_id += 1;
                }else{
                    foreach ($doc_id as $key => $value) {
                        $doc_id = $value->document_id + 1;
                    }
                }
                $str2 = chunk_split($doc_id, 4, "-");
                $str2 = explode("-", $str2);
                $doc_id = $str2[1];
                $data = $this->offices->getOffices();
                $data2 = $this->compliance->getCompliance();
                $this->load->view('adminView/addComplianceForm', array('acted_num' => $acted_num, 'follow_num' => $follow_num, 'due_num' => $due_num, 'doc_id' => $doc_id, 'data' => $data, 'data2' => $data2));
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
                        'message' => "<p style='color: red;'>Others text field is required.</p>"
                        );
                    // $this->load->view('adminView/updateComplianceForm', $y);
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
                    $this->load->view('adminView/updateComplianceForm', $y);
                }
                else{
                    $confirm = $this->document->updateDoc($data, $id);
                    if(!$confirm){
                        echo "Monitoring update failed.";
                    }else{
                        redirect('Users/adminDashboard');
                    }
                }
                
    }

    public function exportActedDocuments() {
        $this->load->view('adminView/exportActedDocuments');
    }

// ----------------End of the functionalities----------------------------------- //
//    >
//    >
//    >
//    >
//    >
// -----------------------Admin Views------------------------------------------- //


    public function viewAdminUsers() {
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
        $this->load->view('adminView/viewSearchDocuments', $data);
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
        $this->load->view('adminView/viewUpdateDocuments', array('acted_num' => $acted_num, 'details' => $details, 'other' => $other, 'office' => $office, 'document' => $document, 'compliance' => $compliance, 'follow_num' => $follow_num, 'due_num' => $due_num));
    }

    public function viewUpdateComplianceForm($id){
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
        $this->load->view('adminView/updateComplianceForm', array('acted_num'=>$acted_num,'follow_num' => $follow_num, 'due_num' => $due_num, 'time' => $time, 'date' => $date, 'other' => $other, 'id' => $id, 'data' => $data, 'data2' => $data2, 'detail' => $detail, 'office' => $office));
        
    }
    
    public function viewAdminDueDate() {
         $date = date("Y-m-d");
        // $date = "2015-12-08";
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
        $this->load->view('adminView/viewDueDate', array('acted_num'=>$acted_num, 'follow_num' => $follow_num, 'due_num' => $due_num, 'other' => $other, 'office'=>$office, 'compliance' => $compliance, 'document' => $document, 'details' => $details));
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
        $this->load->view('adminView/viewFollowUp', $data);
    }

    public function viewAdminActed() {

        $other = $this->other->getOthers();
        $document = $this->document->getDocumentActed();
        $details = $this->document->getDocumentDetails();
        $office = $this->document->getOffices();
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
             'compliance' => $this->compliance->getCompliance(),
            'acted_num' => $acted_num,
            'due_num' => $due_num,
            'follow_num' => $follow_num,
             'other' => $other, 
             'office' => $office,
              'document' => $document,
              'details' => $details
        );
        $this->load->view('adminView/viewActed', $data);
    }

//-----------------------End of the Views--------------------------------------- //
//    >
//    >
//    >
//    >
//    >
//-----------------------Courier Views------------------------------------------ //

    public function viewCourierDueDate() {
        $this->load->view('courierView/viewDueDate');
    }

    public function viewCourierFollowUp() {
        $this->load->view('courierView/viewFollowUp');
    }

    public function viewCourierActed() {
        $this->load->view('courierView/viewActed');
    }

    public function updateStatus($id){
        //  if($this->session->userdata('logged_in')==null){
        //     redirect('Users/index');
        // }else{
        //     if($this->session->userdata('user_type')==2){
        //         redirect('Users/courierDashboard');
        //     }else{
                $confirm = $this->document->updateStatus($id);
                if(!$confirm){
                    echo "Status Update failed.";
                }else{
                    echo "Status Updated successfully.";
                    redirect('Users/adminDashboard');
                }
        //     }
        // }
    }

//-----------------------End of the Views--------------------------------------- //
}
