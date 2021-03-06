<?php
$myTitle = 'Add Class Type - MYSCHOOL APP';
include_once '../pages/header.php';
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                    <div class="ui main text container">
                        <h3 class="ui header">Add class type (eg Secondary,primary etc)</h3>
                        <div class="ui equal width form">
                            <div class="ui message" style="display: none;"></div>
                            <form id="classtype-form" method="post">
                            <div class="fields">
                                <div class="field">
                                    <label>Class Type</label>
                                    <input type="text" name="name" id="name" placeholder="class Type">
                                </div>
                                
                            </div>
                                                       
                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">Add </button></div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/add_classtype.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</body>
</html>
