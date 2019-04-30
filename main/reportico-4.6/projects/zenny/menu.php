<?php
$menu_title = SW_PROJECT_TITLE;
$menu = array (
	array ( "language" => "en_gb", "report" => ".*\.xml", "title" => "<AUTO>" )
	);
?>
<?php
$menu_title = SW_PROJECT_TITLE;
$menu = array (
	array ( "report" => "<p>Welcome to the Zenny School App demo and tutorials.
	<br>In the drop down menus above you will find some reports and graphs.<br>", "title" => "TEXT" ),
	
	/*
	array ( "report" => "<p>Welcome to the Zenny School App demo and tutorials.
	<br>In the drop down menus above you will find some example reports and tutorials.<br>
	<br>To try these reports and tutorials you will need to create the tutorial database tables 
	<br>which are based upon a sample stock and orders database known as Northwind.<br>
	<br>Click the <i>Generate Tutorial Tables</i> below to create the tables in an already existing database
	<br> (the tables created all begin with the prefix northwind_ so they wont conflict with any existing tables).
	<br><br>Once you have created the tables you are ready to
	<br>run through the exercises which are documented in the <a style=\"text-decoration: underline !important\"  target=\"_blank\" href=\"http://www.reportico.org/documentation/4.6/doku.php?id=reporticotutorial\">Reportico online documentation here</a>", "title" => "TEXT" ),

	*/
	//array ( "report" => "stock.xml", "title" => "<AUTO>" ),
	//array ( "report" => "tut2_orders.xml", "title" => "<AUTO>" ),
	array ( "report" => "", "title" => "BLANKLINE" ),
	// array ( "report" => "generate_tutorial.xml", "title" => "Generate The Tutorial Tables" ),
	array ( "report" => "", "title" => "BLANKLINE" ),
	//array ( "report" => "tut1_1_stock.xml", "title" => "<AUTO>" ),
	//array ( "report" => "tut1_2_stock.xml", "title" => "<AUTO>" ),
	//array ( "report" => "tut1_3_stock.xml", "title" => "<AUTO>" ),
	//array ( "report" => "tut1_4_stock.xml", "title" => "<AUTO>" ),
	//array ( "report" => "tut2_1_orders.xml", "title" => "<AUTO>" ),
	//array ( "report" => "tut2_2_orders.xml", "title" => "<AUTO>"),
	);

$admin_menu = $menu;


$dropdown_menu = array(
                    array ( 
                        "project" => "zenny",
                        "title" => "Student/Exams",
                        "items" => array (
                            //array ( "reportfile" => "products.xml" ),
                            array ( "reportfile" => "zenny.xml" ),
                            array ( "reportfile" => "subject.xml" ),
                            array ( "reportfile" => "fees.xml" )
                            )
                        )
                        )
?>
