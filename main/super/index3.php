<?php
$myTitle = 'Welcome to MYSCHOOL APP - Login or Sign Up';

include_once '../pages/header.php';

?>
<body>
<div class="ui open sth"> <i class="sidebar icon"></i>
      Menu</div>
<div class="ui left vertical sidebar menu">
  <div class="item">
    <div class="ui input"><input type="text" placeholder="Search..."></div>
  </div>
  <div class="item">
    <i class="home icon"></i> Home
    <div class="menu">
      <a class="active item">Search</a>
      <a class="item">Add</a>
      <a class="item">Remove</a>
    </div>
  </div>
  <a class="item">
    <i class="grid layout icon"></i> Browse
  </a>
  <a class="item">
    <i class="mail icon"></i> Messages
  </a>
  <div class="ui dropdown item">
    <i class="dropdown icon"></i>
    More
    <div class="menu">
      <a class="item"><i class="edit icon"></i> Edit Profile</a>
      <a class="item"><i class="globe icon"></i> Choose Language</a>
      <a class="item"><i class="settings icon"></i> Account Settings</a>
    </div>
  </div>
</div>

    <?php include_once '../pages/footer.php'; ?>
    
    <script>
// showing multiple
 $(document).ready(function () {
$('.ui.left.sidebar').sidebar({
    transition: 'overlay'
});
// left is opened by button
$('.ui.left.sidebar')
    .sidebar('attach events', '.open.sth');
$('.ui .dropdown').dropdown();
});
</script>

<script>
    $(document).ready(function () {
//          $('.ui.labeled.icon.sidebar').sidebar('toggle');
//        $('.ui.sidebar').sidebar('toggle');
        $('.visible.example .ui.sidebar')
                .sidebar({
                    context: '.visible.example .bottom.segment'
                })
                .sidebar('hide');
    });
</script>
<style>
.ui.sidebar {
    overflow: visible !important;
}
</style>
</body>
</html>
