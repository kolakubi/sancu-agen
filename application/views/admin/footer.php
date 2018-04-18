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
  <!-- datatables script agen -->
  <script>
    $(document).ready(function(){
      $('#datatable').DataTable({
        dom: 'Bfrtip',
        buttons: ['print']
      });
    });
  </script>
  <!-- datatables script pembelian -->
  <script>
    $(document).ready(function(){
      // Setup - add a text input to each footer cell
      $('#datatablepembelian tfoot th').each(function(){
        let title = $(this).text();
        $(this).html('<input type="text" placeholder="Search '+title+'" />' );
        console.log(title);
      });

      // DataTable
      let table = $('#datatablepembelian').DataTable();

      // Apply the search
      table.columns().every(function(){
        var that = this;

        $('input', this.footer()).on('keyup change', function() {
          if(that.search() !== this.value){
            that
            .search(this.value)
            .draw();
          }
        });
      });
    });
  </script>
  <!-- script hapus data -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('.btnhapus').on('click', function(event){
        event.preventDefault();
        let link = $(this).attr('href');
        if(confirm('Anda yakin ingin menghapus Data ini ?')){
          window.location = link;
        }
      })
    })
  </script>

</body>
</html>
