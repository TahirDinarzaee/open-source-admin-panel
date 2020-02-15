<ul class="nav flex-colmun">
    <!-- Standard Link for all Users -->
    <li class="nav-item"><a class="nav-link" href="<?php echo $base_url.'account/index.php?content=profile&user='.$_SESSION['user_unique_id']?>">Profile</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo $base_url.'account/index.php?content=change_password&user='.$_SESSION['user_unique_id']?>">Change Password</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo $base_url.'account/index.php?content=change_email&user='.$_SESSION['user_unique_id']?>">Change Email</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo $base_url.'account/index.php?content=notification_setting&user='.$_SESSION['user_unique_id']?>">Notification Settings</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo $base_url.'account/index.php?content=session-history&user='.$_SESSION['user_unique_id']?>">Login History</a></li>
</ul>