        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="breadcrumb text-left">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#ahpModal">Change Preferences</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
            <div class="card">
                            <div class="gmap_unix card-body">
                                <div class="map" id="basic-map"></div>
                            </div>
                            <div class="card-body" id="mapbody">
                            
                            </div>
            </div>






            <div class="modal fade" id="ahpModal" tabindex="-1" role="dialog" aria-labelledby="ahpLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Location Allocation </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="step1">
                                <div class="text-center">
                                    <h5>Step 1: Vaccination Details</h5>   
                                </div>
                                <div class="input-group" style="margin-top:10px">
                                    <div class="col-5">
                                        <label>Start Date:</label>
                                    </div>
                                    <div class="col-7" >
                                        <input type="date" class="form-control" id="startDate" min="<?= date('Y-m-d')?>">
                                    </div>
                                    <div  class="col-12" id="sderror">
                                        
                                    </div>
                                </div>
                                <div class="input-group" style="margin-top:10px">
                                    <div class="col-5"><label>Type of available vaccine:</label></div>
                                    <div class="col-7">
                                        <select id="vaccineselect" class="form-control">
                                        <?php foreach($vaccine as $v): ?>
                                            <option value="<?=$v->vaccine_name?>"><?=$v->vaccine_name?></option>
                                        <?php endforeach; ?>
                                    </select></div>
                                    <div class="col-12" id="vcerror"></div>
                                </div>
                                <div class="input-group" style="margin-top:10px">
                                    <div class="col-5"><label>Amount of available vaccines:</label></div>
                                    <div class="col-7">
                                        <input type="number" id="vaccineno" value=0 class="form-control"/>
                                    </div>
                                    <div class="col-12" id="vnerror"></div>
                                </div>
                            </div>
                                <div class="ahp" style="display:none">
                                    <div class="text-center" id="ahptitle">
                                    </div>
                                    <div id="ahpbody">
                                        
                                    </div>
                                </div>

                                <div class="fileup" style="display:none">  
                                    <div class="text-center" id="uploadfile">
                                        <h5>Upload Excell File</h5>
                                        <span style="color:red">Reminder! Make Sure the format of the excell file is correct</span>
                                    </div>
                                    <div>
                                                <hr>
                                            <p>Download the file below for the format:</p>
                                            <a href="<?=base_url()?>files/people-format.xlsx" download style="color:blue">people-format.xlsx</a>
                                            <hr>
                                            <h6>Upload File:</h6>
                                            <input type="file" name="">    
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <div class="step3" style="display:none">
                                    <button type="button" class="btn btn-danger" id="btnChange">Change Decision</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-primary" id="btnProceed">Proceed to Map</button>
                                </div> -->
                                <div class="ahp" style="display:none">
                                    <button type="button" class="btn btn-success " data-toggle="modal" data-target="#legendModal"><i class="fa fa-question-circle"></i> Score Guide</button>
                                    <button type="button" class="btn btn-danger" ></i>Reset Scores</button>
                                    <button type="button" class="btn btn-success" id="btnahpEdit" style="display:none"></i>Edit</button>
                                </div>

                                <button type="button" class="btn btn-secondary" id="btnBack">Back</button>
                                <button type="button" class="btn btn-primary" id="btnNext">Next</button>
                                <button type="button" data-dismiss="modal" class="btn btn-primary" id="btnShowResult" style="display:none">Proceed</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="listModal" tabindex="-1" role="dialog" aria-labelledby="ahpLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="listlabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12" id="listbodyhead">
                                    <div class="col-6">Name</div><div class="col-6">Schedule Time</div>
                                </div>
                                <div id="listbody">
                                    <div class="col-6">Ross Inquillo</div><div class="col-6">8:00 AM</div>
                                    <div class="col-6">Zython Lachica</div><div class="col-6">8:00 AM</div>
                                    <div class="col-6">Noe Jay Torres</div><div class="col-6">8:30 AM</div>
                                    <div class="col-6">Raymond Pailagao</div><div class="col-6">8:30 AM</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="btnsavetoPDF">Save as PDF</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-primary" >Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="legendModal" tabindex="-1" role="dialog" aria-labelledby="legendLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">AHP Score Scale</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered" style="text-align:center">
                                    <thead>
                                        <tr>
                                        <th>Intensity of Importance</th>
                                        <th>Definition</th>
                                        <th>Explanation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>1</th>
                                            <td>Equal Importance</td>
                                            <td>Two elements contribute equally to the objective</td>
                                        </tr>
                                        <tr>
                                            <th>3</th>
                                            <td>Moderate Importance</td>
                                            <td>Experience and judgement slightly favor one element over another</td> 
                                        </tr>
                                        <tr>
                                            <th>5</th>
                                            <td>Strong Importance</td>
                                            <td>Experience and judgement strongly favor one element over another</td>
                                        </tr>
                                        <tr>
                                            <th>7</th>
                                            <td>Very Strong Importance</td>
                                            <td>One element is favored very strongly over another; its dominance is demonstrated in practice</td>  
                                        </tr>
                                        <tr>
                                            <th>9</th>
                                            <td>Extreme Importance</td>
                                            <td>The evidence favoring one element over another is of the highest possible order of affirmation</td>  
                                        </tr>
                                        <tr>
                                            <th>2,4,6,8</th>
                                            <td>Intermediate values between the two</td>
                                            <td>When compromise is needed</td>  
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        
                    </div>
                </div>
    </div>