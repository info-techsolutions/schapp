<?php
$myTitle = 'Showing session - MYSCHOOL APP';
include_once '../pages/header.php';
include_once '../inc/config.php';
// Let's confirm deletion
if (isset($_GET['delsession'])) {
    $stmt = $db->prepare('DELETE FROM z_tb_session WHERE session_id = :session_id');
    $stmt->execute(array(':session_id' => $_GET['delsession']));

    header('Location: show_session.php?action=deleted');
    exit();
}
?>

<body>
    <div class="ui bottom attached segment pushable">
        <?php include_once '../pages/menu.php'; ?>


        <div class="pusher">
        
            <div class="ui basic segment">
            
                <div class="ui main text container">
                 <button id="add-admin" class="tiny ui button teal"><i class="left add icon"></i>add</button>
                    <h3 class="ui header">Showing Sessions</h3>
                    <div class="ui equal width form">
                        <?php
                        // Lets get the action status
                        if (isset($_GET['action'])) {
                            echo '<h3>Session ' . $_GET['action'] . '</h3>';
                        }
                        ?>
                        <div class="ui message" style="display: none;"></div>
                        <table id="example" class="ui celled table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Year</th>
                                    <th>No of Times Opened</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Year</th>
                                    <th>No of Times Opened</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                try {
                                    include_once '../inc/config.php';
                                    $r = 1;
                                    $stmt = $db->query('SELECT session_id, year, times_opened FROM z_tb_session ORDER BY session_id ASC');
                                    while ($row = $stmt->fetch()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $r; ?></td>
                                            <td><?php echo $row['year']; ?></td>
                                            <td><?php echo $row['times_opened']; ?></td>
                                            <td>
                                                <a class="tiny ui button" href="edit_session.php?session_id=<?php echo $row['session_id']; ?>"><i class="left edit icon"></i>edit</a>
                                                <a class="tiny ui button red" href="javascript:delsession('<?php echo $row['session_id']; ?>','<?php echo $row['year']; ?>')"><i class="left delete icon"></i>delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $r++;
                                    }
                                } catch (PDOException $exc) {
                                    echo $exc->getMessage();
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
     <!-- Modal -->
    <div class="ui modal" id="add-session">
        <i class="close icon"></i>
        <div class="header">
            Add Session
        </div>
       
        <div class="content">
            <div class="ui form">
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
                            <div class="actions">
			    <div><button class="ui blue right icon button submit" type="submit">Add</button></div>
			</div>
                            </form>
                        </div>
            </div>
        </div>
        
    </div>
    <?php include_once'../pages/footer.php'; ?>
    <script src="../assets/js/add_session.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.semanticui.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
            
            $('#add-admin').on('click', function () {
              $('.ui.modal').modal('show');
           });

        });
        
        function delsession(id, times_opened)
            {
                if (confirm("Are you sure you want to delete session Year: '" + times_opened + "'"))
                {
                    window.location.href = 'show_session.php?delsession=' + id;
                }
            }
    </script>
</body>
</html>
