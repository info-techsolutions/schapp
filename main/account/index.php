<?php
$myTitle = 'WELCOME to MYSCHOOL APP';
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
    <div class="ui middle aligned center aligned grid">
        <div class="column">

            <div class="ui message">

                New to us? | <a href="../public">Login</a>
                <h2 class="ui blue image header">
                    <div class="content">
                        Create an account Now! 
                    </div>
                </h2>
                <form class="ui large form" id="foto-form">
                    <div class="ui stacked segment">
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="hidden" id="ip" name="ip" value="<?php echo $ipResult; ?>">
                                <input type="text" id="person_number" name="person_number" placeholder="Enter Admission Number">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" id="firstname" name="firstname" placeholder="Firstname">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" id="lastname" name="lastname" placeholder="Lastname">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="tel" id="phone" name="phone" placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="field">
    <select name="gender" id="gender">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
  </div>

                        <div class="field">
    <label>Address</label>
    <textarea rows="2" name="address" id="address"></textarea>
  </div>

                        <div class="field">
                            <label>Browse and upload your picture</label>
                            <input type="file" name="image">
                        </div>
                        
                        <div><button class="ui fluid large blue submit button" type="submit">sign up</button></div>
                    </div>

                    <div class="ui error message"></div>

                </form>
            </div>
        </div>
    </div>
    <?php include_once '../pages/footer.php'; ?>
    <script src="../assets/js/signup.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</body>
</html>
