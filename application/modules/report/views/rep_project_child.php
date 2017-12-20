

       <!-- /section:basics/navbar.layout -->
        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>

            <?php $this->load->module('sidebar')->index();?>

            
            <div class="main-content">
                <div class="main-content-inner">
                    <!-- #section:basics/content.breadcrumbs -->
                    <div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                        </script>

                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="<?=base_url()?>dashboard">Dashboard</a>
                            </li>
                            <li >Report</li>
                            <li class="active">Project Child List</li>
                        </ul><!-- /.breadcrumb -->

                        <!-- /section:basics/content.searchbox -->
                    </div>

                    <!-- /section:basics/content.breadcrumbs -->
                    <div class="page-content">
                        

                        <!-- /section:settings.box -->
                        <div class="page-header">
                            <h1>
                                Project Child List
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                    Report
                                </small>
                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                    <div class="col-xs-12">
                                        <form action="<?=base_url()?>report/rep_project_child_filter" target="_blank" method="post" id="activeBoxCollectionSummaryReportForm" class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="payment_projectsite">Project</label>
                                                <div class="col-md-2">
                                                    <select id="payment_projectsite" name="payment_projectsite" class="form-control">
                                                        <?php
                                                        $projectsitelist=$this->mdl_general->GetAllInfo('dn_project_site','psite_id',array('psite_status'=>'1'));
                                                        foreach($projectsitelist as $row){
                                                         ?>
                                                        <option value="<?php echo $row['psite_id']?>"><?php echo $row['psite_name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="orphan_status">Status</label>
                                                <div class="col-md-2">
                                                    <select id="orphan_status" name="orphan_status" class="form-control">
                                                        <?php
                                                        $statlist=$this->mdl_general->GetAllInfo('dn_status','stat_id',array('stat_active'=>'1'));
                                                        foreach($statlist as $row){
                                                         ?>
                                                        <option value="<?php echo $row['stat_id']?>"><?php echo $row['stat_name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="">&nbsp;</label>
                                                <div class="col-md-4">
                                                    <input type="submit" name='pdf' value="PDF" class="btn btn-primary"/>
                                                    <input type="submit" name='xls' value="XLS" class="btn btn-primary"/>
                                                    <input type="submit" name='show' value="Show" class="btn btn-primary"/>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

            <?php $this->load->module('footer')->index(); ?>
            <script src="<?=base_url()?>assets/js/date-time/bootstrap-datepicker.js"></script>
            <script>
            $(".datepicker").datepicker({
                autoclose: true,
                todayHighlight: true,
                format:'dd-mm-yyyy' 
            });
            </script>
            
    </body>
</html>