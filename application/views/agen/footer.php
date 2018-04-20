          </div> <!-- row di header buat wrap konten-->

          <nav class="navbar navbar-default" id="footer">

            <div class="container-fluid">
              <p class="navbar-text" style="color: white;">Copyright Sancu Creative Indonesia @2018</p>
              <p class="navbar-text text-right" style="color: white;">ver 1.0</p>
            </div>

          </nav>

        </div> <!-- column -->
      </div> <!-- row -->
    </div> <!-- end of cotainer -->
    <script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.js"></script>
    <!-- script footer tetap di bawah -->
    <script type="text/javascript">
      $(document).ready(function() {
        let docHeight = $(window).height();
        let footerHeight = $('#footer').height();
        let footerTop = $('#footer').position().top + footerHeight;
        if (footerTop < docHeight)
            $('#footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');
      });
    </script>

  </body>
</html>
