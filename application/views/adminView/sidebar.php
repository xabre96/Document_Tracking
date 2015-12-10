<section class="sidebar" style="background: #4b8355;">
    <!-- Sidebar user panel -->
    <div class="user-panel">

        <div class="pull-left info" style="color: #FFF;">
            <p>Hello, <?php echo $this->session->userdata('name'); ?></p>
           
            <!-- <a href="#" style="color: #FFF;"><i class="fa fa-circle" style="color: red;"></i> Online</a> -->
            <p style="color: #FFF;">Admin</p>
            <a href="<?php echo base_url('Users/editProfile/'.$this->session->userdata('user_id')); ?>" style="color: yellow;">Edit my Profile</a>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="active">
            <a href="<?php echo base_url('Users/adminDashboard');?>">
                <i class="fa fa-exclamation"></i> <span>Notifications</span>
            </a>
        </li>
        <li class="active">
            <a href="<?php echo base_url('Users/viewSearchDocuments'); ?>">
                <i class="glyphicon glyphicon-search"></i> <span>Search Documents</span>
            </a>
        </li>
        <li class="treeview" style="background: #f9f9f9;">
            <a href="#">
                <i class="glyphicon glyphicon-file"></i>
                <span>Compliance</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url('Users/complianceForm'); ?>" style="margin-left: 10px;"><i class="fa fa-plus"></i>Add Compliance</a></li>

                <li>
                    <a href="<?php echo base_url('Users/viewUpdateDocuments'); ?>" style="margin-left: 10px;">
                        <i class="glyphicon glyphicon-pencil"></i> <span>Update</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url('Users/viewAdminDueDate'); ?>" style="margin-left: 10px;">
                        <i class="glyphicon glyphicon-th-list"></i> <span>Due Date</span>
                        <small class="badge pull-right" style="background: #c10e0e;"><?php echo $due_num; ?></small>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('Users/viewAdminFollowUp'); ?>" style="margin-left: 10px;">
                        <i class="glyphicon glyphicon-edit"></i> <span>Follow up</span>
                        <small class="badge pull-right" style="background: yellow;"><?php echo $follow_num; ?></small>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('Users/viewAdminActed'); ?>" style="margin-left: 10px;">
                        <i class="glyphicon glyphicon-ok"></i> <span>Acted</span>
                        <small class="badge pull-right" style="background: #cfcdcc;"><?php echo $acted_num; ?></small>
                    </a>
                </li>
            </ul>
        </li>

        <li class="treeview" style="background: #f9f9f9;">
            <a href="#">
                <i class="fa fa-users"></i>
                <span>Users</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url('Users/addCourierForm'); ?>" style="margin-left: 10px;"><i class="fa fa-plus"></i> Add User</a></li>
                <li><a href="<?php echo base_url('Users/viewAdminUsers'); ?>" style="margin-left: 10px;"><i class="glyphicon glyphicon-eye-open"></i>Users</a></li>
            </ul>
        </li>

        <li class="active">
            <a href="<?php echo base_url('Users/logout'); ?>">
                <i class="fa fa-mail-reply"></i> <span>Logout</span>
            </a>
        </li>






    </ul>
</section>