<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/semantic.min.js"></script>

    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.semanticui.min.js"></script>
    
    <script src="../assets/js/dataTables.responsive.min.js"></script>
    <script src="../assets/js/responsive.semanticui.min.js"></script>
    
   <script>
 $('.ui.left.sidebar').sidebar({
 dimPage: false,
 transition: 'push',
 exclusive: false,
 closable: false
 });

 $('.ui.left.sidebar')
 .sidebar('attach events', '#left-sidebar-toggle');

// Go back -----------//
	$('.backs').on('click', function(){
    	parent.history.back();
	return false;	
	
	});
        
// For right sidebar 
/*
 $('.ui.right.sidebar').sidebar({
 dimPage: false,
 transition: 'overlay',
 exclusive: false,
 closable: false
 });

 $('.ui.right.sidebar')
.sidebar('attach events', '#right-sidebar-toggle');
*/
</script>  
<!--
<script>
// showing multiple
 $(document).ready(function () {
$('.ui.left.sidebar').sidebar({
    transition: 'overlay'
});

// Go back -----------//
	$('.backs').on('click', function(){
    	parent.history.back();
	return false;	
	
	});
	
// left is opened by button
$('.ui.left.sidebar')
    .sidebar('attach events', '.open.button');
$('.ui .dropdown').dropdown();
});
</script>

<style>
.ui.sidebar {
    overflow: visible !important;
}
</style>
-->
