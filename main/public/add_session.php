<?php
$myTitle = 'Add Session - MYSCHOOL APP';
include_once '../pages/header.php';
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>

        <div class="pusher">
            <div class="ui basic segment">
                    <div class="ui main text container">
                        <h3 class="ui header">Add Session</h3>
                        <div class="ui equal width form">
                            <div class="ui message" style="display: none;"></div>
                            <form id="session-form" method="post">
                       
                            <div class="fields">
                                <div class="field">
                                    <label>Choose a session:</label>
                                    <select name="year" id="year">
                                        <option value="2019/2020">2019/2020</option>
                                        <option value="2018/2019">2018/2019</option>
                                        <option value="2017/2018">2017/2018</option>
                                        <option value="2016/2017">2016/2017</option>
                                        <option value="2015/2016">2015/2016</option>
                                        
                                    </select>
                                </div>
                                    <div class="field">
                                    <label>No of times to open</label>
                                    <input type="text" name="times_opened" id="times_opened" placeholder="No of times to open">
                                </div>

                            </div>
                            
                            <div class="fields">
                                <div><button class="ui fluid large blue submit button" type="submit">Add</button></div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/add_session.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('select.dropdown').dropdown();
        });
    </script>
</body>
</html>
