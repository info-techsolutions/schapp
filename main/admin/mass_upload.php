<?php

session_start(); //Start the current session
session_name("Admin");
if (@$_SESSION['log'] == null && @$_SESSION['log'] != "YES") {
    //echo "Sorry, You are not logged in. Please log in to be able to view this page";
    include('../super/login.php');
    exit;
}

$myTitle = 'Mass upload - MYSCHOOL APP';
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
            <h3 class="ui header">Mass Upload</h3>
             
             <p>General Format</p>
             		1. Download a copy of the input csv file for each upload you choose.
                      
                        <p>The first column (xxx_id)is ignored for new mass upload and should be correct for existing data modification.</p>
                        <hr />
                        
                        
                        2. Enter the data in the csv file.
				First row shows the field /column name. Next few rows shows some sample data.
				You can remove the sample data but don't delete the field/column names.
				Save the file only in .csv format.
				<hr />
			3. Upload the file by clicking on Export Students.
			
			<hr />
			<br />
			 <div class="ui grey icon button">
                           <a style="color: #fff;" href="export_students.php"> Download Students</a>
                        </div>
                        
                        <div class="ui teal labeled icon button" id="student" stylee="margin-left: 9em;">
                            Export Students
                            <i class="lock icon"></i>
                        </div>
                        
                        <div class="ui horizontal divider">
                            Or
                        </div>
                        
                        
                        <div class="ui grey icon button">
                           <a style="color: #fff;" href="export_scores.php"> Download grade</a>
                        </div> 
                        
                        <div class="ui blue labeled icon button" id="grade" stylee="margin-left: 9em;">
                            Export grades
                            <i class="lock icon"></i>
                        </div>
                        
                        <div class="ui horizontal divider">
                            Or
                        </div>
                        
                        
                        <div class="ui grey labeled icon button" id="grades" stylee="margin-left: 9em;">
                            Something else
                            <i class="lock icon"></i>
                        </div>
               </div> <!-- End of main container -->
            </div>	<!-- End of segment -->


        </body> <!-- ./ End of body -->
    </div><!-- ./End of container -->
</div><!-- ./End of pusher -->

    <!-- Modal -->
    <div class="ui modal students">
        <i class="close icon"></i>
        <div class="header">
            Export Students
        </div>

        <div class="content">
        <div class="ui response" style="display: none;"></div>
            <div class="ui form students">
                <div class="ui equal width form">
                
                    

                    <form id="import-students" method="post">
                        
                        <div class="fields">
                           
                            <div class="field">
                                <label>Browse and upload your CSV File</label>
                                <input type="file" name="csv_file" id="csv_file">
                            </div>
                        </div>
                        <div class="actions">
                            <div><button class="ui blue right icon button submit" type="submit">export</button></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    
        <!-- Modal -->
    <div class="ui modal grades">
        <i class="close icon"></i>
        <div class="header">
            Export Grade
        </div>

        <div class="content">
        <div class="ui response1" style="display: none;"></div>
            <div class="ui form grades">
                <div class="ui equal width form">
                
                    

                    <form id="import-grades" method="post">
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

                                        <label>Test</label>
                                        <select id="tests" name="tests">
                                        </select>
                                    </div>

                                </div>
                                <div class="fields">

                                    <div class="field">

                                        <label>Subject</label>
                                        <select id="subjects" name="subjects">
                                        </select>
                                    </div>

                                    <div class="field">

                                        <label>Classes</label>
                                        <select id="classes" name="classes">
                                        </select>
                                    </div>

                                    <div class="field">

                                        <label>Arms</label>
                                        <select id="arms" name="arms">
                                        </select>
                                    </div>

                                </div>
                            </div>
                        
                        <div class="fields">
                           
                            <div class="field">
                                <label>Browse and upload your CSV File</label>
                                <input type="file" name="csv_file" id="csv_file">
                            </div>
                        </div>
                        <div class="actions">
                            <div><button class="ui blue right icon button submit" type="submit">export</button></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
<?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/import_scores.js"></script>
        <script src="../assets/js/import_students.js"></script>
      <script src="../assets/js/get_criteria.js"></script>
   <script>
        $(document).ready(function () {
            $('#student').on('click', function () {
                $('.ui.modal.students').modal('show');
            });
            $('#grade').on('click', function () {
                $('.ui.modal.grades').modal('show');
            });
            
    });
    </script>
</html>
