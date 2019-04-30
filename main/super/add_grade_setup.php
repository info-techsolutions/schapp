<?php
$myTitle = 'Setup Grade - MYSCHOOL APP';
include_once '../pages/header.php';
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                <div class="ui main text container">
                    <h3 class="ui header">Add Student</h3>
                    <div class="ui equal width form">
                        <div class="ui message" style="display: none;"></div>
                        <form id="grade-form" method="post">

                            <div class="wrapper">
                                <div class="fields">

                                    <div class="field">
                                        <label>From</label>
                                        <input type="text" name="from[]" id="from" placeholder="from">
                                    </div>
                                    <div class="field">
                                        <label>To</label>
                                        <input type="text" name="to[]" id="to" placeholder="to">
                                    </div>

                                    <div class="field">
                                        <label>Grade</label>
                                        <input type="text" name="grade[]" id="grade" placeholder="grade">
                                    </div>
                                    <div class="field">
                                        <label>Remark</label>
                                        <input type="text" name="remark[]" id="remark" placeholder="Remark">
                                    </div>
                                    <button class="ui compact labeled icon button add_field_button">
                                        <i class="add icon"></i>
                                        add
                                    </button>

                                </div>
                            </div>


                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">Add student</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/add_gradesetup.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
            var maxFields = 10; // maximum input boxes allowed
            var wrapper = $('.wrapper'); // Fields wrapper
            var addButton = $('.add_field_button'); // Add button 

            var x = 1; // initial input boxes count
            $(addButton).click(function (e) { // On add input button click
                e.preventDefault();
                if (x < maxFields) { // max input box allowed
                    x++; //input boxes increments
                    $(wrapper).append('<div class="fields">'
                            + '<div class="field">'
                            + '<label>From</label>'
                            + '<input type="text" name="from[]" id="from" placeholder="from">'
                            + '</div>'
                            + '<div class="field">'
                            + '<label>To</label>'
                            + '<input type="text" name="to[]" id="to" placeholder="To">'
                            + '</div>'
                            + '<div class="field">'
                            + '<label>Grade</label>'
                            + '<input type="text" name="grade[]" id="grade" placeholder="Grade">'
                            + '</div>'
                            + '<div class="field">'
                            + '<label>Remarks</label>'
                            + '<input type="text" name="remark[]" id="remark" placeholder="Remark">'
                            + '</div>'
                            + '<a href="#" class="ui tiny red button remove_field">Remove</a>'
                            + '</div>'); // Add input boxes
                }

            });
            $(wrapper).on('click', '.remove_field', function (e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
        });
    </script>
</body>
</html>
