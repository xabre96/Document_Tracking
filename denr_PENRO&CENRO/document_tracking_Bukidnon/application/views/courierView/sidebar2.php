<section class="sidebar" style="background: #4b8355;">
    <!-- Sidebar user panel -->
    <div class="user-panel">

        <div class="pull-left info" style="color: #FFF;">
            <p>Hello, Shun Cale</p>

            <a href="#" style="color: #FFF;"><i class="fa fa-circle" style="color: red;"></i> Online</a>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="active">
            <a href="index.html">
                <i class="fa fa-exclamation"></i> <span>Notifications</span>
            </a>
        </li>
        <li class="active">
            <a href="<?php echo base_url(''); ?>">
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
                <li>
                    <a href="<?php echo base_url('Users/viewCourierDueDate'); ?>" style="margin-left: 10px;">
                        <i class="glyphicon glyphicon-th-list"></i> <span>Due Date</span>
                        <small class="badge pull-right" style="background: #c10e0e;">32</small>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('Users/viewCourierFollowUp'); ?>" style="margin-left: 10px;">
                        <i class="glyphicon glyphicon-edit"></i> <span>Follow up</span>
                        <small class="badge pull-right bg-yellow">23</small>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('Users/viewCourierActed'); ?>" style="margin-left: 10px;">
                        <i class="glyphicon glyphicon-ok"></i> <span>Acted</span>
                        <small class="badge pull-right" style="background: #cfcdcc;">53</small>
                    </a>
                </li>
            </ul>
        </li>
        <li class="active">
            <a href="<?php echo base_url('Users/logout'); ?>">
                <i class="fa fa-mail-reply"></i> <span>Logout</span>
            </a>
        </li>
    </ul>
</section>