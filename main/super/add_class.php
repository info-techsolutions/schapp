<?php
$myTitle = 'Add Class - MYSCHOOL APP';
include_once '../pages/header.php';
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                    <div class="ui main text container">
                        <h3 class="ui header">Add class</h3>
                        <div class="ui equal width form">
                            <div class="ui message" style="display: none;"></div>
                            <form id="class-form" method="post">
                            <div class="fields">
                                <div class="field">
                                    <label>Class Name</label>
                                    <input type="text" name="name" id="name" placeholder="class name">
                                </div>
                                
                            </div>
                                                       
                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">Add class</button></div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/add_class.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</body>
</html>
