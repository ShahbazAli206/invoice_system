<aside class="side-nav">
    <div class="logo">
        <img src="<?php echo e(asset('img/admin.jpg')); ?>" width="20%" alt="">
        Restaurent Panel
    </div>
    <ul>
        <li>
            <a href="<?php echo e(route('technicianpanel.introduction')); ?>"><script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                <lord-icon
                    src="https://cdn.lordicon.com/bhfjfgqz.json"
                    trigger="hover"
                    colors="primary:#121331"
                    style="width:40px;height:40px">
                </lord-icon>&nbsp;Profile</a>
        </li>

        <li>
            <a href="<?php echo e(route('technicianpanel')); ?>"><script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                <lord-icon
                    src="https://cdn.lordicon.com/lthhecik.json"
                    trigger="hover"
                    colors="primary:#121331,secondary:#08a88a"
                    style="width:40px;height:40px">
                </lord-icon>&nbsp; Orders</a>
        </li>
       
        <li>
            <a href="<?php echo e(route('technician.menu')); ?>"><script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                <lord-icon
                    src="https://cdn.lordicon.com/hpivxauj.json"
                    trigger="hover"
                    colors="primary:#121331"
                    style="width:40px;height:40px">
                </lord-icon>&nbsp; Menu</a>

        </li>
        <li>
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 80%;">
                    <a href="<?php echo e(route('technician.notifications')); ?>"><script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                        <lord-icon
                            src="https://cdn.lordicon.com/hpivxauj.json"
                            trigger="hover"
                            colors="primary:#121331"
                            style="width:40px;height:40px">
                        </lord-icon>&nbsp; Notifications      
                </a>
                </div>
                <div style="width: 20%;">
                    <a  style="height:60px; padding-left:2px;" href="<?php echo e(route('technician.notifications')); ?>" >
                        <i class="fa fa-bell fa-2x"></i>
                        <span class="info-count" id="navbarDropdownn"><?php echo e(auth()->user()->unreadNotifications->count()); ?></span>
                    </a>
                </div>
              </div>
        </li>
        <li>
            
            <a href="<?php echo e(route('technician.notifications')); ?>"><script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                <lord-icon
                    src="https://cdn.lordicon.com/hpivxauj.json"
                    trigger="hover"
                    colors="primary:#121331"
                    style="width:40px;height:40px">
                </lord-icon>&nbsp; Notifications      
        </a>

        </li>
        <li>
            <a href="<?php echo e(route('technicianpanel.pages.profile')); ?>"><script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                <lord-icon
                    src="https://cdn.lordicon.com/edxgdhxu.json"
                    trigger="hover"
                    colors="primary:#4be1ec,secondary:#cb5eee"
                    style="width:50px;height:50px">
                </lord-icon>&nbsp; Edit Profile</a>
        </li>
        <li>
            <a href="<?php echo e(route('chatting')); ?>"><script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                <lord-icon
                    src="https://cdn.lordicon.com/hpivxauj.json"
                    trigger="hover"
                    colors="primary:#121331"
                    style="width:40px;height:40px">
                </lord-icon>&nbsp; Chat</a>

        </li>
    </ul>

    <div class="logout">
        <form action="<?php echo e(route('logout')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M5 21q-.825 0-1.413-.587Q3 19.825 3 19V5q0-.825.587-1.413Q4.175 3 5 3h7v2H5v14h7v2Zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5Z"/></svg>
            &nbsp; logout
        </button>
        </form>
    </div>
</aside><?php /**PATH C:\xampp\htdocs\group_repo\resources\views/technician/partials/nav.blade.php ENDPATH**/ ?>