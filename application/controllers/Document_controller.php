<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Document_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model', 'users');
        $this->load->model('document_model', 'document');
        $this->load->model('other_model', 'other');
        $this->load->model('offices_model', 'offices');
        $this->load->model('compliance_model', 'compliance');
    }

    public function addDocument()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('users_controller/index');
        }

        if ($this->session->userdata('user_type') == 2) {
            redirect('users_controller/courierDashboard');
        }

        if ($this->session->userdata('user_type') == 3) {
            redirect('users_controller/guestDashboard');
        }

        $data = $this->input->post();
        var_dump([$data]);die;

        if ($this->session->userdata('logged_in') == null) {
            redirect('users_controller/index');
        } else {
            if ($this->session->userdata('user_type') == 2) {
                redirect('users_controller/courierDashboard');
            } elseif ($this->session->userdata('user_type') == 3) {
                redirect('users_controller/guestDashboard');
            } else {
                $data = $this->input->post();
                $office = 0;
                for ($x = 0; $x < count($data["office"]); $x++) {
                    if ($data["office"][$x] == 13) {
                        $office = 13;
                        break;
                    }
                }
                if ($this->form_validation->run() == FALSE) {
                    $date = date("Y-m-d");
                    $due_num = $this->document->getDueNum($date);
                    $follow_num = $this->document->getFollowNum($date);
                    $acted_num = $this->document->getActedNum();
                    if ($acted_num == null) {
                        $acted_num = 0;
                    } else {
                        foreach ($acted_num as $key => $value) {
                            $acted_num = $value->count;
                        }
                    }
                    if ($due_num == null) {
                        $due_num = 0;
                    } else {
                        foreach ($due_num as $key => $value) {
                            $due_num = $value->count;
                        }
                    }
                    if ($follow_num == null) {
                        $follow_num = 0;
                    } else {
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
                    if ($this->session->userdata("user_type") == 1) {
                        $this->load->view('adminView/addComplianceForm', $y);
                    } else {
                        $this->load->view('courierView/addComplianceForm', $y);
                    }
                } else if ($office == 13 && $data["others"] == "") {
                    $doc_id = $this->document->maxId();
                    foreach ($doc_id as $key => $value) {
                        $doc_id = $value->document_id + 1;
                    }
                    $date = date("Y-m-d");
                    $due_num = $this->document->getDueNum($date);
                    $follow_num = $this->document->getFollowNum($date);
                    $acted_num = $this->document->getActedNum();
                    if ($acted_num == null) {
                        $acted_num = 0;
                    } else {
                        foreach ($acted_num as $key => $value) {
                            $acted_num = $value->count;
                        }
                    }
                    if ($due_num == null) {
                        $due_num = 0;
                    } else {
                        foreach ($due_num as $key => $value) {
                            $due_num = $value->count;
                        }
                    }
                    if ($follow_num == null) {
                        $follow_num = 0;
                    } else {
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
                    if ($this->session->userdata("user_type") == 1) {
                        $this->load->view('adminView/addComplianceForm', $y);
                    } else {
                        $this->load->view('courierView/addComplianceForm', $y);
                    }
                } else if ($office == 0 && $data["others"] != "") {
                    $doc_id = $this->document->maxId();
                    foreach ($doc_id as $key => $value) {
                        $doc_id = $value->document_id + 1;
                    }
                    $date = date("Y-m-d");
                    $due_num = $this->document->getDueNum($date);
                    $follow_num = $this->document->getFollowNum($date);
                    $acted_num = $this->document->getActedNum();
                    if ($acted_num == null) {
                        $acted_num = 0;
                    } else {
                        foreach ($acted_num as $key => $value) {
                            $acted_num = $value->count;
                        }
                    }
                    if ($due_num == null) {
                        $due_num = 0;
                    } else {
                        foreach ($due_num as $key => $value) {
                            $due_num = $value->count;
                        }
                    }
                    if ($follow_num == null) {
                        $follow_num = 0;
                    } else {
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
                    if ($this->session->userdata("user_type") == 1) {
                        $this->load->view('adminView/addComplianceForm', $y);
                    } else {
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
                        redirect('users_controller/viewUpdateDocuments');
                    } else {
                        $this->session->set_flashdata('message', '
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <i class="glyphicon glyphicon-ok"></i>
                                Document successfully added.
                            </div>   
                        ');
                        // if ($this->session->userdata("user_type")==1) {
                        redirect('users_controller/viewUpdateDocuments');
                        // }else{
                        //   redirect('users_controller/courierDashboard');
                        // }
                    }
                }
            }
        }
    }
}