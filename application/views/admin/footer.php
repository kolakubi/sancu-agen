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
  <script type="text/javascript" src="<?php echo base_url() ?>asset/datatables/buttons/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>asset/datatables/buttons/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>asset/datatables/jszip/jszip.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>asset/datatables/pdfmake/pdfmake.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>asset/datatables/pdfmake/vfs_fonts.js"></script>

  <!-- datatables -->
  <script>
    $(document).ready(function(){

      // fungsi DataTable
      function prettyTable(tableId, tableTitle){
        // Setup - add a text input to each footer cell
        $('#'+tableId+' tfoot td').each(function(){
          let title = $(this).text();
          $(this).html('<input type="text" placeholder="cari '+title+'" />' );
        });
        // hapus fitur search di nomor sama action
        $('#'+tableId+' tfoot td:nth-child(1) input').remove();
        $('#'+tableId+' tfoot td:nth-last-child(1) input').remove();

        // DataTable
        let table = $('#'+tableId).DataTable({
          // ilangin sort dan search pada kolom
          "columnDefs": [
            {
              'targets': ['action'],
              'searchable': false,
              'sortable': false
            }
          ],
          // munculin export ke excel
          dom: 'Bfrtip',
          buttons: [
            'pdf', 'excel',
            {//ganti print title
              extend: 'print',
              title: function(){
                return tableTitle
              }
            }
          ]
        });

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
      }

      //datatables agen
      prettyTable('datatableagen', 'Info Agen');
      
      //datatables pembelian
      prettyTable('datatablepembelian', 'Info Pembelian');


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
