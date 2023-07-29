
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="lib/plugins/owl.carousel.min.js"></script>
<script>
  AOS.init();
</script>
<script type="text/javascript">


	$(document).ready(function() {
   $('#example').DataTable( {
    dom: 'Bfrtip',
    buttons: [
    'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });
 } );

  $(".dt-button").addClass("btn btn-primary");


// this script animates and collapse the side bar
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  $("#openNav").fadeOut();
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  $("#openNav").fadeIn();
}
</script>


</body>
</html>