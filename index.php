<?php include 'header.php'; ?>  

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Query Answering System</h3> 
          </div>
        </div>

        <!-- page start-->
        <div class="row">
          <div class="col-lg-6">
            <section class="panel">
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="get" action="index_proses.php">
                    <div class="form-group">
                      <label for="autosize" class="control-label col-lg-2">Keluhan</label>
                      <div class="col-lg-10">
                        <textarea name="keluhan" class="form-control ckeditor" rows="4"></textarea>
                      </div>
                    </div>
                    <div class="col-lg-offset-2 col-lg-10">
                        <input class="btn btn-primary" name="proses" type="submit" value="Proses">
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>

          <div class="col-lg-6">
            <section class="panel"> 
              <div class="panel-body">              
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">
					<div class="form-group">
                      <label for="autosize" class="control-label col-lg-2">Saran</label>
					  <div class="col-lg-10">
						<textarea id="autosize" class="form-control" rows="7" colspan="100" style="overflow:auto;"></textarea>
					  </div>
					</div>
                  </form>
                </div>
              </div>
            </section>
          </div>

        </div>  
        <!-- page end-->

          </section>
      </section>
      <!--main content end-->

      <?php 
      include 'footer.php'
      ?>

  