<div class="sidebar-menu">
    <header class="logo-env">

        <!-- logo -->
        <div class="logo" style="">
            <a href="<?php echo base_url(); ?>">
                <img src="uploads/logo.png" style="max-height:60px;" />
            </a>
        </div>

        <!-- logo collapse icon -->
        <div class="sidebar-collapse" style="">
            <a href="#" class="sidebar-collapse-icon with-animation">

                <i class="entypo-menu"></i>
            </a>
        </div>

        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>

    <div style=""></div>
    <ul id="main-menu" class="">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->


        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?parents/dashboard">
                <i class="entypo-gauge"></i>
                <span>
                    <?php echo ('Dashboard'); ?>
                </span>
            </a>
        </li>



        <!-- TEACHER -->
        <li class="<?php if ($page_name == 'teacher')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?parents/teacher_list">
                <i class="entypo-users"></i>
                <span>
                    <?php echo ('Teacher'); ?>
                </span>
            </a>
        </li>

        <!-- DAILY ATTENDANCE -->
        <li class="<?php if ($page_name == 'manage_attendance')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?parents/manage_attendance/<?php echo date("d/m/Y"); ?>">
                <i class="entypo-chart-area"></i>
                <span>
                    <?php echo ('Daily Attendance'); ?>
                </span>
            </a>

        </li>

        <!-- CLASS ROUTINE -->
        <li class="<?php if ($page_name == 'class_routine')
            echo 'opened active'; ?> ">
            <a href="#">
                <i class="entypo-target"></i>
                <span>
                    <?php echo ('Class Routine'); ?>
                </span>
            </a>
            <ul>
                <?php
                $children_of_parent = $this->db->get_where(
                    'student',
                    array(
                        'parent_id' => $this->session->userdata('parent_id')
                    )
                )->result_array();
                foreach ($children_of_parent as $row):
                    ?>
                    <li class="<?php if ($page_name == 'class_routine')
                        echo 'active'; ?> ">
                        <a
                            href="<?php echo base_url(); ?>index.php?parents/class_routine/<?php echo $row['student_id']; ?>">
                            <span><i class="entypo-dot"></i>
                                <?php echo $row['name']; ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>

        <!-- EXAMS -->
        <li class="<?php
        if ($page_name == 'marks')
            echo 'opened active'; ?> ">
            <a href="#">
                <i class="entypo-graduation-cap"></i>
                <span>
                    <?php echo ('Exam Marks'); ?>
                </span>
            </a>
            <ul>
                <?php
                foreach ($children_of_parent as $row):
                    ?>
                    <li class="<?php if ($page_name == 'marks')
                        echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>index.php?parents/marks/<?php echo $row['student_id']; ?>">
                            <span><i class="entypo-dot"></i>
                                <?php echo $row['name']; ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>

        <!-- PAYMENT -->
        <!-- <li class="<?php if ($page_name == 'invoice')
            echo 'opened active'; ?> ">
            <a href="#">
                <i class="entypo-credit-card"></i>
                <span>
                    <?php echo ('Payment'); ?>
                </span>
            </a>
            <ul>
                <?php
                foreach ($children_of_parent as $row):
                    ?>
                    <li class="<?php if ($page_name == 'invoice')
                        echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>index.php?parents/invoice/<?php echo $row['student_id']; ?>">
                            <span><i class="entypo-dot"></i>
                                <?php echo $row['name']; ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li> -->


        <!-- LIBRARY -->
        <li class="<?php if ($page_name == 'book')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?parents/book">
                <i class="entypo-book"></i>
                <span>
                    <?php echo ('Library'); ?>
                </span>
            </a>
        </li>

        <!-- TRANSPORT -->
        <!-- <li class="<?php if ($page_name == 'transport')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?parents/transport">
                <i class="entypo-location"></i>
                <span>
                    <?php echo ('Transport'); ?>
                </span>
            </a>
        </li> -->

        <!-- NOTICEBOARD -->
        <li class="<?php if ($page_name == 'noticeboard')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?parents/noticeboard">
                <i class="entypo-doc-text-inv"></i>
                <span>
                    <?php echo ('Noticeboard'); ?>
                </span>
                <span class="badge badge-secondary pull-right">
                    <?php
                    $this->db->where('parent_id', $this->session->userdata('login_user_id'));
                    $noticeboard_notification_count = $this->db->get('noticeboard_notification')->num_rows();
                    echo $noticeboard_notification_count;
                    ?>
                </span>
            </a>
        </li>

        <!-- MESSAGE -->

        <li class="<?php if ($page_name == 'message')
            echo 'active'; ?> ">

            <a href="<?php echo base_url(); ?>index.php?parents/message">
                <i class="entypo-mail"></i>
                <span>
                    <?php echo ('Message'); ?>

                    <?php
                    $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

                    $this->db->where('sender', $current_user);
                    $this->db->or_where('reciever', $current_user);
                    $message_threads = $this->db->get('message_thread')->result_array();

                    $messageCounts = 0;

                    foreach ($message_threads as $row):

                        // defining the user to show
                        if ($row['sender'] == $current_user)
                            $user_to_show = explode('-', $row['reciever']);
                        if ($row['reciever'] == $current_user)
                            $user_to_show = explode('-', $row['sender']);

                        $user_to_show_type = $user_to_show[0];
                        $user_to_show_id = $user_to_show[1];
                        $unread_message_number = $this->crud_model->count_unread_message_of_thread($row['message_thread_code']);

                        $messageCounts += $unread_message_number;
                    endforeach;
                    ?>
                </span>
                <span class="badge badge-secondary pull-right">
                    <?php echo $messageCounts; ?>
                </span>
            </a>
        </li>

        <!-- ACCOUNT -->
        <li class="<?php if ($page_name == 'manage_profile')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?parents/manage_profile">
                <i class="entypo-lock"></i>
                <span>
                    <?php echo ('Account'); ?>
                </span>
            </a>
        </li>

    </ul>

</div>