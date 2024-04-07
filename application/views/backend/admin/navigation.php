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
            <a href="<?php echo base_url(); ?>index.php?admin/dashboard">
                <i class="entypo-gauge"></i>
                <span>
                    <?php echo ('Dashboard'); ?>
                </span>
            </a>
        </li>

        <!-- CLASS -->
        <li class="<?php
        if (
            $page_name == 'class' ||
            $page_name == 'section'
        )
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-flow-tree"></i>
                <span>
                    <?php echo ('Class'); ?>
                </span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'class')
                    echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/classes">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('Manage Classes'); ?>
                        </span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'section')
                    echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/section">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('Manage Sections'); ?>
                        </span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- SUBJECT -->
        <li class="<?php if ($page_name == 'subject')
            echo 'opened active'; ?> ">
            <a href="#">
                <i class="entypo-docs"></i>
                <span>
                    <?php echo ('Subject'); ?>
                </span>
            </a>
            <ul>
                <?php
                $classes = $this->db->get('class')->result_array();
                foreach ($classes as $row):
                    ?>
                    <li class="<?php if ($page_name == 'subject' && $class_id == $row['class_id'])
                        echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>index.php?admin/subject/<?php echo $row['class_id']; ?>">
                            <span>
                                <?php echo ('Class'); ?>
                                <?php echo $row['name']; ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>

        <!-- CLASS ROUTINE -->
        <li class="<?php if ($page_name == 'class_routine')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/class_routine">
                <i class="entypo-calendar"></i>
                <span>
                    <?php echo ('Class Routine'); ?>
                </span>
            </a>
        </li>

        <!-- PARENTS -->
        <li class="<?php if ($page_name == 'parent')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/parent">
                <i class="entypo-user"></i>
                <span>
                    <?php echo ('Parents'); ?>
                </span>
            </a>
        </li>

        <!-- STUDENT -->
        <li class="<?php
        if (
            $page_name == 'student_add' ||
            $page_name == 'acd_session' ||
            $page_name == 'online_admission' ||
            $page_name == 'student_bulk_add' ||
            $page_name == 'student_information' ||
            $page_name == 'student_marksheet'
        )
            echo 'opened active has-sub';
        ?> ">
            <a href="#">
                <i class="fa fa-group"></i>
                <span>
                    <?php echo ('Student Section'); ?>
                </span>
            </a>
            <ul>
                <!-- STUDENT ADMISSION -->

                <li class="<?php if ($page_name == 'acd_session')
                    echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/acd_session">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('Academic Session'); ?>
                        </span>
                    </a>
                </li>



                <li class="<?php if ($page_name == 'student_add')
                    echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/student_add">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('Admit Student'); ?>
                        </span>
                    </a>
                </li>

                <!-- STUDENT BULK ADMISSION -->
                <!-- <li class="<?php if ($page_name == 'student_bulk_add')
                    echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/student_bulk_add">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('Admit Bulk Student'); ?>
                        </span>
                    </a>
                </li> -->

                <!-- STUDENT INFORMATION -->
                <li class="<?php if ($page_name == 'student_information')
                    echo 'opened active'; ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('Student Information'); ?>
                        </span>
                    </a>
                    <ul>
                        <?php
                        $classes = $this->db->get('class')->result_array();
                        foreach ($classes as $row):
                            ?>
                            <li class="<?php if ($page_name == 'student_information' && $class_id == $row['class_id'])
                                echo 'active'; ?>">
                                <a
                                    href="<?php echo base_url(); ?>index.php?admin/student_information/<?php echo $row['class_id']; ?>">
                                    <span>
                                        <?php echo ('Class'); ?>
                                        <?php echo $row['name']; ?>
                                    </span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <!-- STUDENT MARKSHEET -->
                <li class="<?php if ($page_name == 'student_marksheet')
                    echo 'opened active'; ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('Student Marksheet'); ?>
                        </span>
                    </a>
                    <ul>
                        <?php
                        $classes = $this->db->get('class')->result_array();
                        foreach ($classes as $row):
                            ?>
                            <li class="<?php if ($page_name == 'student_marksheet' && $class_id == $row['class_id'])
                                echo 'active'; ?>">
                                <a
                                    href="<?php echo base_url(); ?>index.php?admin/student_marksheet/<?php echo $row['class_id']; ?>">
                                    <span>
                                        <?php echo ('Class'); ?>
                                        <?php echo $row['name']; ?>
                                    </span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        </li>

        <!-- TEACHER -->
        <li class="<?php if ($page_name == 'teacher')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/teacher">
                <i class="entypo-users"></i>
                <span>
                    <?php echo ('Teacher Section'); ?>
                </span>
            </a>
        </li>

        <!-- STUDY MATERIAL -->
        <li class="<?php if ($page_name == 'study_material')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/study_material">
                <i class="entypo-book-open"></i>
                <span>
                    <?php echo ('Study Material'); ?>
                </span>
            </a>
        </li>


        <!-- DAILY ATTENDANCE -->
        <li class="<?php if ($page_name == 'manage_attendance')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/manage_attendance/<?php echo date("d/m/Y"); ?>">
                <i class="entypo-chart-area"></i>
                <span>
                    <?php echo ('Daily Attendance'); ?>
                </span>
            </a>

        </li>

        <!-- EXAMS -->
        <li class="<?php
        if (
            $page_name == 'exam' ||
            $page_name == 'grade' ||
            $page_name == 'marks' ||
            $page_name == 'exam_marks_sms'
        )
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-graduation-cap"></i>
                <span>
                    <?php echo ('Exam Section'); ?>
                </span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'exam')
                    echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/exam">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('Exam List'); ?>
                        </span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'grade')
                    echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/grade">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('Exam Grades'); ?>
                        </span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'marks')
                    echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/marks">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('Manage Marks'); ?>
                        </span>
                    </a>
                </li>
                <!-- <li class="<?php if ($page_name == 'exam_marks_sms')
                    echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/exam_marks_sms">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('Send marks by sms'); ?>
                        </span>
                    </a>
                </li> -->
            </ul>
        </li>

        <!-- PAYMENT -->
        <!-- <li class="<?php if ($page_name == 'invoice')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/invoice">
                <i class="entypo-credit-card"></i>
                <span>
                    <?php echo ('Payment and Invoice'); ?>
                </span>
            </a>
        </li> -->

        <!-- ACCOUNTING -->
        <!-- <li class="<?php
        if (
            $page_name == 'income' ||
            $page_name == 'expense' ||
            $page_name == 'expense_category'
        )
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span>
                    <?php echo ('Accounting Section'); ?>
                </span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'income')
                    echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/income">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('Income'); ?>
                        </span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'expense')
                    echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/expense">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('Expense'); ?>
                        </span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'expense_category')
                    echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/expense_category">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('Expense category'); ?>
                        </span>
                    </a>
                </li>
            </ul>
        </li> -->

        <!-- LIBRARY -->
        <li class="<?php if ($page_name == 'book')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/book">
                <i class="entypo-book"></i>
                <span>
                    <?php echo ('Library'); ?>
                </span>
            </a>
        </li>

        <!-- TRANSPORT -->
        <!-- <li class="<?php if ($page_name == 'transport')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/transport">
                <i class="entypo-location"></i>
                <span>
                    <?php echo ('Transportation'); ?>
                </span>
            </a>
        </li> -->

        <!-- DORMITORY -->
        <!-- <li class="<?php if ($page_name == 'dormitory')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/dormitory">
                <i class="entypo-home"></i>
                <span>
                    <?php echo ('Dormitory'); ?>
                </span>
            </a>
        </li> -->

        <!-- NOTICEBOARD -->
        <li class="<?php if ($page_name == 'noticeboard')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/noticeboard">
                <i class="entypo-doc-text-inv"></i>
                <span>
                    <?php echo ('Noticeboard'); ?>
                </span>
                <span class="badge badge-secondary pull-right">
                    <?php
                    $this->db->where('admin_id', $this->session->userdata('login_user_id'));
                    $noticeboard_notification_count = $this->db->get('noticeboard_notification')->num_rows();
                    echo $noticeboard_notification_count;
                    ?>
                </span>
            </a>
        </li>

        <!-- MESSAGE -->
        <li class="<?php if ($page_name == 'message')
            echo 'active'; ?> ">

            <a href="<?php echo base_url(); ?>index.php?admin/message">
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

        <!-- SETTINGS -->
        <li class="<?php
        if (
            $page_name == 'system_settings' ||
            $page_name == 'manage_language' ||
            $page_name == 'sms_settings'
        )
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-lifebuoy"></i>
                <span>
                    <?php echo ('Settings'); ?>
                </span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'system_settings')
                    echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/system_settings">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('General Settings'); ?>
                        </span>
                    </a>
                </li>
                <!-- <li class="<?php if ($page_name == 'sms_settings')
                    echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/sms_settings">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('SMS Settings'); ?>
                        </span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'manage_language')
                    echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/manage_language">
                        <span><i class="entypo-dot"></i>
                            <?php echo ('Language Settings'); ?>
                        </span>
                    </a>
                </li> -->
            </ul>
        </li>

        <!-- ACCOUNT -->
        <li class="<?php if ($page_name == 'manage_profile')
            echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/manage_profile">
                <i class="entypo-lock"></i>
                <span>
                    <?php echo ('Account'); ?>
                </span>
            </a>
        </li>

    </ul>

</div>