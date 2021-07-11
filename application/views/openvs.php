<div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-6 col-sm-6">

                        <div class="card">
                            <div class="card-header">
                                <h4><strong>OPEN VACCINE STATIONS</strong></h4> <small></small>
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
                                    <p class = "text-dark"><strong><i>Download the Template below:</i></strong></p>
                                   <a href="<?=base_url()?>files/vs-format.xlsx" download style="color:blue"><h4> <i class="fa fa-file-excel-o" aria-hidden="true" style="color:blue"></i> vs-format.xlsx</h4></a>
                                </div>
                            </div>
                            <div class="card-body card-block pt-0">
                                <form id="openvsform" method="POST" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label class=" form-control-label">Vaccine Type:</label>
                                    <div class="input-group">
                                        <select class="form-control" id="vcn" name="vaccinename" type="text" required>
                                            <option value="Pfizer">Pfizer</option>
                                            <option value="Sinovac">Sinovac</option>
                                            <option value="Moderna">Moderna</option>
                                        </select>
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
                                <h4><strong class="card-title">RESULT</strong></h4>
                            </div>
                            <div id="resultbody" class="card-body">

                              
                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
