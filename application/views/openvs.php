<div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-6 col-sm-6">

                        <div class="card">
                            <div class="card-header">
                                <strong>Open Vaccine Stations</strong> <small></small>
                            </div>
                            <div id="resultbtn" style="display:none">
                                
                            </div>
                            <div id="resultview" style="display:none">
                                <div class="card-body card-block" id="body">

                                </div>
                            </div>
                            <div id="inputview">
                            <div class="card-body card-block">
                                <div>
                                    <h4><i>Download the Excell File below</i></h4>
                                   <a href="<?=base_url()?>files/vs-format.xlsx" download style="color:green"><h4> <i class="fa fa-file-excel-o" aria-hidden="true" style="color:green"></i> vs-format.xlsx</h4></a>
                                </div>
                            </div>
                            <hr/>
                            <div class="card-body card-block">
                                <form id="openvsform" method="POST" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label class=" form-control-label">Vaccine Name:</label>
                                    <div class="input-group">
                                        <input class="form-control" id="vcn" name="vaccinename" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Total Number of Vaccine Available:</label>
                                    <div class="input-group">
                                        <input class="form-control" id="vca" type="number" name="vaccineavailable" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Target No. of days:</label>
                                    <div class="input-group">
                                        <input class="form-control" id="vcd" type="number" name="vaccinedays" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">UPLOAD FILE</label>
                                    <div class="input-group">
                                        <input class="" type="file" id="openvsupload" name="file" accept=".xlsx" required>
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit" id="btnopenvs">PROCESS</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Result</strong>
                            </div>
                            <div id="resultbody" class="card-body">

                              
                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
