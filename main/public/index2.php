<?php
$myTitle = 'Welcome to MYSCHOOL APP - Login or Sign Up';

include_once '../pages/header.php';

?>
<body>
<div class="context example inverted left vertical">
  <div class="ui top attached demo menu">
    <a class="item">
      <i class="sidebar icon"></i>
      Menu
    </a>
  </div>
  <div class="ui bottom attached segment">
    <div class="ui top inverted sidebar menu">
      <a class="item">
        <i class="home icon"></i>
        Home
      </a>
      <a class="item">
        <i class="block layout icon"></i>
        Topics
      </a>
      <a class="item">
        <i class="smile icon"></i>
        Friends
      </a>
     <div class="ui pointing dropdown link item">
      <i class="world icon"></i>
      <span class="text">Select Language</span>
      <div class="menu">
        <div class="item">Arabic</div>
        <div class="item">Chinese</div>
        <div class="item">Danish</div>
        <div class="item">Dutch</div>
        <div class="item">English</div>
        <div class="item">French</div>
        <div class="item">German</div>
        <div class="item">Greek</div>
        <div class="item">Hungarian</div>
        <div class="item">Italian</div>
        <div class="item">Japanese</div>
        <div class="item">Korean</div>
        <div class="item">Lithuanian</div>
        <div class="item">Persian</div>
        <div class="item">Polish</div>
        <div class="item">Portuguese</div>
        <div class="item">Russian</div>
        <div class="item">Spanish</div>
        <div class="item">Swedish</div>
        <div class="item">Turkish</div>
        <div class="item">Vietnamese</div>
      </div>
    </div>
    </div>
    <div class="pusher">
      <div class="ui basic segment">
        <h3 class="ui header">Application Content</h3>
        <img class="ui wireframe image" src="http://www.semantic-ui.com/images/wireframe/short-paragraph.png">
        <img class="ui wireframe image" src="http://www.semantic-ui.com/images/wireframe/short-paragraph.png">
        <img class="ui wireframe image" src="http://www.semantic-ui.com/images/wireframe/short-paragraph.png">
        <img class="ui wireframe image" src="http://www.semantic-ui.com/images/wireframe/short-paragraph.png">
      </div>
    </div>
  </div>
</div>

    <?php include_once '../pages/footer.php'; ?>
    
    <script>
// showing multiple
 $(document).ready(function () {
$('.context.example .ui.sidebar')
  .sidebar({
    context: $('.context.example .bottom.segment'),
    transition: 'push'
  })
  .sidebar('attach events', '.context.example .top.attached.menu .item');

$('.ui.dropdown').dropdown();
});
</script>
<style>
.ui.sidebar {
    overflow: visible !important;
}
</style>
</body>
</html>
