<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}


$myTitle = 'School Fees - MYSCHOOL APP';
include_once '../pages/header.php';
?>

<?php include_once'../pages/menu.php'; ?>

<div class="pusher">
    <div class="ui container">
        <!-- BODY -->
        <body>


            <?php include_once'../pages/menuoptions.php'; ?>
            <div class="ui basic segment">
                <div class="ui main text container">
                    <h3 class="ui header">School Fees</h3>
                    <div class="ui message" style="display: none;"></div>
                    <div class="ui equal width form">
                        
                        <form id="fee-status-form" method="post">

                            <div class="wrapper">
                                <div class="fields">

                                    <div class="field">

                                        <label>Session</label>
                                        <select id="sessions" name="sessions">
                                        </select>
                                    </div>

                                    <div class="field">

                                        <label>Terms</label>
                                        <select id="terms" name="terms">
                                        </select>
                                    </div>

                                    <div class="field">

                                        <label>Class</label>
                                        <select id="classes" name="classes">
                                        <option value="">--choose a class--</option>
                                        </select>
                                    </div>
                                    
                                        <div class="field">

                                        <label>Student</label>
                                        <select id="person_number" name="person_number">
                                        </select>
                                    </div>
                                    </div>
                                    
                                    
                                 
                                  <div class="fields">
                                
                                    
                                    <div class="field">

                                        <label>Payment status</label>
                                        <select id="status" name="status">
                                        </select>
                                    </div>
                                    
                                      <div class="field">

                                        <label>Payment Mode</label>
                                        <select id="mode" name="mode">
                                        <option value="cash">Cash</option>
                                        <option value="bank">Bank</option>
                                        <option value="online">Online</option>
                                        <option value="others">Others</option>
                                       
                                        </select>
                                    </div>
                                    
                                    <div class="field">
                                <label>Amount</label>
                                <input type="number" name="amt" id="amt" placeholder="amount">
                            </div>
                            
                             <div class="field">
                                <label>Comments</label>
                                <textarea rows="2" name="comments" id="comments"></textarea>
                            </div>
                            
                           </div>
                          
          

                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">register</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- End of main container -->
            </div>	<!-- End of segment -->


        </body> <!-- ./ End of body -->
    </div><!-- ./End of container -->
</div><!-- ./End of pusher -->
    <?php include_once'../pages/footer.php'; ?>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
            $("#person_number").attr('disabled', true);
            
            $.getJSON("../classes/get_payment_options.php", function (return_data) {
                $.each(return_data.data, function (key, value) {
                    $("#status").append("<option value=" + value.fees_setup_id + ">" + value.name + "</option>");
                });
            });
            
            ////////////////////////////////////////////////
                      
             $("#classes").on('change', function () {
                var admNo = $(this).val();

                var getGet = $.ajax({
                    url: '../public/get_child_name.php',
                    type: 'POST',
                    data: {admNo: admNo},
                    dataType: 'json'
                });
                getGet.done(function (response) {
                    var len = response.length;

                    	$("#person_number").empty();
			$("#person_number").attr('disabled', false);
			$("#person_number").addClass('loading');
			
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];

                        $("#person_number").append("<option value='" + id + "'>" + name + "</option>");
                    }
                });
                getGet.fail(function (e) {
                    console.log(e.status);
                    console.log(e.statusText);
                });
            });
////////////////////////////////////////////////////////

	$('#classes').trigger('change');
        });
    </script>
     <script src="../assets/js/fee_status.js"></script>
    <!--<script src="../assets/js/school_fees.js"></script>-->
    <script src="../assets/js/get_criteria.js"></script>
</html>
