<?php
$myTitle = 'Welcome to MYSCHOOL APP - Welcome to demo page';
include_once '../pages/header.php';
?>

<style type="text/css">
    body {
        background-color: #DADADA;
    }
    body > .grid {
        height: 100%;
    }
    .image {
        margin-top: -100px;
    }
    .column {
        max-width: 450px;
    }
</style>    
<body>
    <div class="ui bottom attached segment pushable">
<?php include_once '../pages/menu.php'; ?>
        <div class="pusher">
            <div class="ui basic segment">
            <div class="ui card">
  <div class="image">
    <img src="../images/home-bg.jpg">
  </div>
  <div class="content">
    <div class="header">Watchmen</div>
    <div class="description">
      In a gritty and alternate 1985 the glory days of costumed vigilantes have been brought to a close by a government crackdown, but after one of the masked veterans is brutally murdered an investigation into the killer is initiated.
    </div>
  </div>
  <div class="ui two bottom attached buttons">
    <div class="ui button">
      <i class="add icon"></i>
      Queue
    </div>
    <div class="ui primary button">
      <i class="play icon"></i>
      Watch
    </div>
  </div>
</div>
<div class="ui popup">
  <div class="header">User Rating</div>
  <div class="ui star rating" data-rating="3"></div>
</div>

                <div class="ui main text container">
                   Welcome ..............
                   
                   
                   

                   
                   
                   
                </div>
            </div>
        </div>
    </div>
    <?php include_once'../pages/footer.php'; ?>
    
</body>
</html>
