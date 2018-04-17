      <nav class="navbar navbar-default">

        <div class="container-fluid">
          <p class="navbar-text">Copyright Sancu Creative Indonesia @<?php echo date('Y') ?></p>
          <p class="navbar-text">ver 1.0</p>
        </div>

      </nav>

    </div> <!-- row -->
  </div> <!-- end of cotainer -->
  <script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.js"></script>
  <!-- datatables js -->
  <script type="text/javascript" src="<?php echo base_url() ?>asset/datatables/datatables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>asset/datatables/buttons/js/buttons.bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>asset/datatables/buttons/js/buttons.print.min.js"></script>
  <!-- datatables script -->
  <script>
    $(document).ready(function(){
      $('#datatable').DataTable({
        dom: 'Bfrtip',
        buttons: ['print']
      });
    });
  </script>

</body>
</html>
