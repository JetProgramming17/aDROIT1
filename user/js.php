    <!-- jQuery Version 1.11.0 -->
    <script src="../assets/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>
    
    <!-- FORM VALIDATION -->
    
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
    console.log('Tab switched to: ' + e.target.hash);
});

    </script>