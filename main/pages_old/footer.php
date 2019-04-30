<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/semantic.min.js"></script>

    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.semanticui.min.js"></script>
    
    <script src="../assets/js/dataTables.responsive.min.js"></script>
    <script src="../assets/js/responsive.semanticui.min.js"></script>
<script>
// showing multiple
 $(document).ready(function () {
$('.ui.left.sidebar').sidebar({
    transition: 'overlay'
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
