<?php
$myTitle = 'Welcome to MYSCHOOL APP - Login or Sign Up';

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

<?php include_once '../pages/public_menu.php'  ?>


    <div class="ui middle aligned center aligned grid">
        <div class="column">
          <h2 class="ui orange image header">
      <img src="../images/logo.png" class="image">
      <div class="content">
        MYSCHOOL APP
      </div>
    </h2>
            
   	     <div class="ui attached message">
  <div class="header">
    Forgot Password
  </div>
  <p>Change your password at ease!</p>
</div>
<form class="ui form attached fluid segment">

  <div class="field">
    <label>Username</label>
    <input placeholder="Username" type="text">
  </div>
  <div class="field">
    <label>New Password</label>
    <input type="password" placeholder="Password">
  </div>
  <div class="field">
    <label>Confirm new password</label>
    <input type="password" placeholder="Confirm new password">
  </div>
  <div class="ui blue submit button">change</div>
</form>
<div class="ui bottom attached warning message">
  <i class="icon help"></i>
  click to <a href="../public">login</a>.
</div>

        </div>
    </div>
    <?php include_once '../pages/footer.php'; ?>
    
    <!-- Modal -->
    <div class="ui modal">
        <i class="close icon"></i>
        <div class="header">
            Signup Now!
        </div>

        <div class="content">
        <div class="ui message" style="display: none;"></div>
            <div class="ui form schoolForm">
                <div class="ui equal width form">
                    

                    <form id="sch-form" method="post">
                        <div class="fields">
                            <div class="field">
                                <label>Your School Name:</label>
                                <input type="text" name="name" id="name" placeholder=" Your School Name:">
                            </div>
                             <div class="field">
                                <label>School email Address:</label>
                                <input type="email" name="email" id="email" placeholder=" Your School Email:">
                            </div>
                             <div class="field">
                                <label>Provide a username:</label>
                                <input type="text" name="user" id="user" placeholder=" Please provide a username :">
                            </div>
                            </div>
                     
                     <div class="fields">
                     
                     <div class="field">
                                <label>Password</label>
                                 <input type="text" name="pass" id="pass" placeholder=" Please provide a username :">
                            </div>
                             <div class="field">
                                <label>Browse and upload your school logo</label>
                                <input type="file" name="image">
                            </div>
                     <div class="field">
                                <label>Address</label>
                                <textarea rows="2" name="address" id="address"></textarea>
                            </div>
                     </div>
                    
                        <div class="actions">
                            <div><button class="ui blue right icon button submit" type="submit">create</button></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <script src="../assets/js/school_signup.js"></script>
    <!--<script src="../assets/js/auth.js"></script>-->
    
    <script>
    $(document).ready(function(){
       $('#addSch').on('click', function () {
                $('.ui.modal').modal('show');
            });

    });
    </script>
</body>
</html>
