(function($){
    $(document).ready(function(){
    $('#ahpModal').modal({
    show: true
    }); 
    // $('#btnnav').toggle();
    // addschedtoUI();
});
$(document).on("change",".ahpscore",function(){
    console.log($(this).closest("div").closest("div").children("#id"));
});
var dummydata = [{'vaccinesite':'Cagayan de Oro Medical Center','lat':8.485796,'lng':124.646854,'vaccinestation':[{'name':'station1','target':75},{'name':'station2','target':50},{'name':'station3','target':75}],'barangays':['Puntod','Macabalan','Barangay22','Kauswagan']},
              {'vaccinesite':'Cagayan de Oro Polymedic Medical Plaza','lat':8.4982,'lng':124.630417,'vaccinestation':[{'name':'station1','target':50},{'name':'station2','target':50}],'barangays':['Kauswagan','Bonbon','Bayabas','Bulua','Patag']},
              {'vaccinesite':'J.R. Borja General Hospital','lat':8.481297,'lng':124.627864,'vaccinestation':[{'name':'station1','target':100},{'name':'station2','target':70},{'name':'station3','target':80}],'barangays':['Carmen','Lumbia','Patag','Balulang']},
              ];
var map;
var barangay;
var schedule=[];
var crit=[];
var sortdis=[];
var counter = 0;
var checker = 0;
var myStyles =[
    {
        featureType: "poi",
        elementType: "labels",
        stylers: [
              { visibility: "off" }
        ]
    }
];
 map = new GMaps({
        el: '#basic-map',
        lat: 8.4542,
        lng: 124.6319,
        zoom: 12,
        zoomControl : true,
        zoomControlOpt: {
            style : 'SMALL',
            position: 'TOP_LEFT'
        },
        styles: myStyles,   
        panControl : true,
        // draggable: false,
        streetViewControl : false,
        mapTypeControl: true,
        overviewMapControl: false   
    });
// console.log(map);
    $pagecounter=0;
    $(document).ready(function() {
        $(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });

    $(document).on('click','#btnBack',function(){
        counter-=1;
        console.log(counter);
        if(counter==0){
            $('.ahp').hide();
            $('.step1').show();
        }
        else{
            getCriteria();
            $('#btnNext').show();
            $('#btnShowResult').hide();
            createAHP('#ahpdiv');
        }
    });
    $(document).on('click','#btnChange',function(){
        $('.step3').hide();
        $('#step3body').html('');
        $('.step1').show();

    });
    function sort_by_key(array, key)
    {
     return array.sort(function(a, b)
     {
      var x = a[key]; var y = b[key];
      return ((x < y) ? -1 : ((x > y) ? 1 : 0));
     });
    }
    function addschedtoUI(){
        $vaccine = $("#vaccineselect").val();
        $vnumber = $("#vaccineno").val();   
        $text = `<div class="m-1"><button class="btn btn-info btn-icon"><i class="fa fa-print"></i> Convert Whole Schedule to PDF</button></div>
        <div><h5>Vaccine Type:<strong style="color:green">${$vaccine}</strong></h5></div>`;
        $text += `<div><h5>Available Amount:<strong style="color:green">${$vnumber} pieces</strong></h5><div>`;
        $text += `<div><h5>Vaccine Lifespan:<strong style="color:green">5 days</strong></h5><div>`;
        $text += `<div><h5>Calculated Vaccination Duration:<strong style="color:green">3 days</strong></h5><div>`;
        $text += `<div class="col-12 m-2">
                    <div class="col-4">
                        <h5></h5>
                    </div>
                    <div class="col-4 text-center">
                        <h5>Day 1</h5>
                    </div>
                    <div class="col-4 text-right">
                        <h5><a href="" style="color:blue">Next Day</a></h5>
                    </div>
                  </div>`;
        $text+=`<table class="table">
                    <thead>
                    <th>
                        <strong>Vaccine Site</strong>
                    </th>
                    <th class="text-center">
                        <strong>Target</strong>
                    </th>
                    <th class="text-center">
                        <strong>Barangays</strong>
                    </th>
                    <th class="text-center">
                        <strong>Action</strong>
                    </th>
                    </thead>`;
        $text+="<tbody>";


        for($i=0;$i<dummydata.length;$i++){
            $text+=`<tr>
                        <td><h6 id="vname" style="margin:0px;padding:0px">${dummydata[$i]['vaccinesite']}</h6>`;

            var vs = dummydata[$i]['vaccinestation'];
            for($x=0;$x<vs.length;$x++){
                $text+=`${vs[$x]['name']}</br>`;
            }
            $text+=`</td><td class="text-center" id="target">`
            for($x=0;$x<vs.length;$x++){
                $text+=`</br>${vs[$x]['target']}`;
            }
            $text+=`</td>
                        <td class="text-center" id="vdate">`;
            var vs = dummydata[$i]['barangays'];
            for($x=0;$x<vs.length;$x++){
                console.log(vs);
                $text+=`${vs[$x]}</br>`;
            }
            $text+=`</td>
                        <td class="row justify-content-center"><button class="btn btn-info btnlistModal" data-toggle="modal" data-target="#listModal">Show List</button></td>
                    </tr>`;
            // $text+=`<tr>
   //                      <input type="hidden" id="barangay_id" value=${schedule[$i]['barangay_id']} />
   //                      <td id="vname">${schedule[$i]['vc_name']}</td>
   //                      <td id="bname">${schedule[$i]['barangay_name']}</td>
   //                      <td class="text-center" id="vdate">${schedule[$i]['vaccination_date']}</td>
   //                      <td class="text-center"><button class="btn btn-info btnlistModal" data-toggle="modal" data-target="#listModal">Show List</button></td>
   //                  </tr>`;
        }
        $text+="</tbody></table>";
        $('#mapbody').html($text);
    }
    function setSchedule(vstation){
        for($i=0;$i<sortdis.length;$i++){
            $vs = vstation[sortdis[$i][0]['index']];
            $bname = sortdis[$i][0]['bname'];
            $bid = sortdis[$i][0]['barangay_id'];
            if(schedule){
                $taken = [];
                for($x=0;$x<schedule.length;$x++){
                    $taken.push(schedule[$x]['vc_id']);
                }
                $run = $taken.includes($vs['vc_id']);
                $counter=0;
                while($run){
                    $counter+=1;
                    $vs = vstation[sortdis[$i][$counter]['index']];
                    $run=$taken.includes($vs['vc_id']);
                    $bname = sortdis[$i][$counter]['bname'];
                    $bid = sortdis[$i][$counter]['barangay_id'];
                    // console.log($counter);
                }
            }
            schedule.push({'barangay_id':$bid,'barangay_name':$bname,'vc_id':$vs['vc_id'],'vc_name':$vs['vc_name'],'vaccination_date':$("#startDate").val()});    
            }
        sortdis=[];
        console.log(schedule);
        addschedtoUI();
    }
    function getDistance(orig,des,bar,ind,vstation){
        var service = new google.maps.DistanceMatrixService();
        service.getDistanceMatrix(
          {
            origins: orig,
            destinations: des,
            travelMode: 'DRIVING',
            avoidHighways: false,
            avoidTolls: false,
          }, callback);

        function callback(response, status) {
          // See Parsing the Results for
          // the basics of a callback function.
          // console.log(orig + " and " + des);
          // console.log(response);
          checker+=1;
          if(response){
            $result = response['rows'][0]['elements'];
            $newdata = [];
            for($i=0;$i<$result.length;$i++){
                $newdata[$i]={'index':$i,'value':$result[$i]['distance']['value'],'bname':bar['barangay_name'],'barangay_id':bar['barangay_id']};
            }
            sortdis[ind]=sort_by_key($newdata, 'value');
          }
          if(checker==barangay.length){
            console.log(sortdis);   
            setSchedule(vstation);
            checker=0;
          }
          // console.log(schedule);
        }
    }
    $(document).on('change','[name=ahpoption]',function(){
        $chosen = $(this).val();
        if($chosen=="Existing"){
            $("#scerror").html('');
            $("#scerror").hide();
            $("#custom").hide();
            $("#cexisting").show();
        }
        else{
            $("#cexisting").hide();
            $("#custom").show();    
        }
    })
    $(document).on('click','.btnlistModal',function(){
        $bname = $(this).parent().parent().children('#bname').text();
        $bid = $(this).parent().parent().children('#barangay_id').val();
        $vname = $(this).parent().parent().children().children('#vname').text();
        $vdate = $(this).parent().parent().children('#vdate').text();
        // console.log($bname);
        console.log($vname);
        $('#listlabel').html(`<h5>${$vname}</h5>`);
        $.ajax({
            type:"GET",
            url: location.origin+"/r2n/main_c/getList?barangay_id="+$bid,
            success:function(response){
                $res = JSON.parse(response);
                $text="";
                for($i=0;$i<$res.length;$i++){
                    $text+=`<div class="col-6">${$res[$i]['person_lastName']}, ${$res[$i]['person_firstName']} ${$res[$i]['person_middleName']}</div><div class="col-6">00:00 AM</div>`;
                }
                $('#listbody').html($text);
            }
        });

    })
    $(document).on('click','#btnShowResult',function(){
        var icon = {
                        url: location.origin+"/r2n/assets/markers/h1.png", // url
                        scaledSize: new google.maps.Size(50, 50), // scaled size
                        origin: new google.maps.Point(0,0), // origin
                        anchor: new google.maps.Point(0, 0) // anchor
                    };
        for($i=0;$i<dummydata.length;$i++){  
                map.addMarker({
                    lat: dummydata[$i]['lat'],
                    lng: dummydata[$i]['lng'],
                    title: dummydata[$i]['vaccinesite'],
                    icon: icon,
                    infoWindow: {
                        content: `<p>${dummydata[$i]['vaccinesite']}</p>`
                    }
                });
                // $vlist.push(($res[$i]['vc_lat']+","+$res[$i]['vc_lng']));
            }
            map.fitZoom();
            addschedtoUI();
        // while(map.markers.length) { map.markers.pop().setMap(null); }
     //    $.ajax(
     //        {
     //            type:"POST",
     //            url: location.origin+"/r2n/main_c/getbarangay",
     //            data:{},
     //            success:function(response){
     //                $res = JSON.parse(response);
     //                barangay = $res;
     //                $.ajax(
     //                    {
     //                        type:"POST",
     //                        url: location.origin+"/r2n/main_c/getstations",
     //                        data:{},
     //                        success: function(response){
     //                            $res = JSON.parse(response);
     //                            $vlist = [];
     //                            var icon = {
     //                                url: location.origin+"/r2n/assets/markers/h1.png", // url
     //                                scaledSize: new google.maps.Size(50, 50), // scaled size
     //                                origin: new google.maps.Point(0,0), // origin
     //                                anchor: new google.maps.Point(0, 0) // anchor
     //                            };

     //                            for($i=0;$i<$res.length;$i++){  
     //                                map.addMarker({
     //                                    lat: $res[$i]['vc_lat'],
     //                                    lng: $res[$i]['vc_lng'],
     //                                    title: $res[$i]['vc_name'],
     //                                    icon: icon,
     //                                    infoWindow: {
     //                                        content: `<p>${$res[$i]['vc_name']}</p>`
     //                                    }
     //                                });
     //                                $vlist.push(($res[$i]['vc_lat']+","+$res[$i]['vc_lng']));
     //                            }
     //                            for($x=0;$x<barangay.length;$x++){
     //                                $orig = [barangay[$x]['barangay_lat']+","+barangay[$x]['barangay_lng']];
     //                                getDistance($orig,$vlist,barangay[$x],$x,$res);
     //                            }
     //                            map.fitZoom();  
     //                        }
     //                    });     
     //            }
     //        });
        
    });
    $('#btnNext').click(function(){
        // $approve = 3;
        counter+=1;
        console.log(counter);
        getCriteria();
        // $chose = $("[name=ahpoption]:checked").val();
        // crit=[];
        // if($("#criteriaselect").val()){
        //  crit = $("#criteriaselect").val();  
        // }
        // $date = $("#startDate").val();
        // $vaccine = $("#vaccineselect").val();
        // $vnumber = $("#vaccineno").val();
        // $now = new Date().toISOString().slice(0, 10);
        // $approve = 0;
        // if($vnumber<1){
        //  $("#vnerror").html("<span style='color:red'>Error: Vacccine amount must be greater than 0.</span>");
        // }
        // else{
        //  $("#vnerror").html('');
        //  $approve+=1;
        // }
        // if($date==""){
        //  $("#sderror").html("<span style='color:red'>Error: Pls choose a date.</span>");
        // }
        // else if($date<$now){
        //  $("#sderror").html("<span style='color:red'>Error: Pls input only today or greater than today.</span>");    
        // }
        // else{
        //  $("#sderror").html('');
        //  $approve+=1;
        // }
        // if(crit==null && $chose=="Custom"){
        //  $("#scerror").html("<span style='color:red'>Error: Minimum of 3 Criteria Required.</span>");
        // }
        // else if(crit.length<3 && $chose=="Custom"){
        //  $("#scerror").html("<span style='color:red'>Error: Minimum of 3 Criteria Required.</span>");
        // }
        // else{
        //  $("#scerror").html('');
        //  $approve+=1;        
        // }
        if(counter==1){
            $("#scerror").html('');
            $("#sderror").html('');
            $("#vnerror").html('');
            $(".step1").hide();
            $(".ahp").show();

            $text = '';
            $text += `<div class="input-group m-2" >
                                    <div class="col-3"><label>AHP From:</label></div>
                                    <div class="col-9">
                                        <select id="ahp1" class="form-control">
                                        <option value="own">Your Own</option>
                                        <option value="c1">Default: </option>
                                        <option value="c2">Default: </option>
                                    </select></div>
                                </div>`;
            $text += '<div id="ahpdiv"></div>';
            
            $('#ahpbody').html($text);
            createAHP("#ahpdiv");
        }
        else if (counter==2){
            $(".ahp").hide();
            $('#btnNext').hide();
            $('#btnShowResult').show();
            $('.fileup').show();
        }
    });
    function getCriteria(){
        crit=["Barangay Level","Number of Cases","Density"];
        $('#ahptitle').html(`<h5>Step 2: AHP </h5>`);
    }
    function createAHP(id){
        console.log($("#ahp1").val());
        $text='';
        $text+='<div class="text-center"><p style="font-size:10">AHP Score Board</p></div><table class="table table-bordered" style="font-size:10px;text-align:center"><thead><tr><th></th>';
            for($x=0;$x<crit.length;$x++){
                $text+="<th>"+crit[$x]+"</th>";
            }
            $text += '</tr></thead><tbody>';
            for($y=0;$y<crit.length;$y++){
                $text+='<tr id="score'+$y+'"><th>'+crit[$y]+'</th>';
                for($z=0;$z<crit.length;$z++){
                    $text+='<td>';
                    if($z==$y){
                        $text+='1';
                    }
                    else if($("#ahp1").val()!="own"){
                    $text+='1';
                    }
                    $text+='</td>';             
                };   
                $text+="</tr>";
            }
            if($("#ahp1").val()=="own"){
            $text+='</tbody></table><div class="text-center col-12"><span>Choose Who is more important </span></div>';
            $cr=0;
            for($a=0;$a<crit.length;$a++){
                for($b=$a+1;$b<crit.length;$b++){
                    $text+='<div class="btn-group btn-group-toggle col-12" data-toggle="buttons"><input type="hidden" id="id" value="';
                    $text+=$cr+'"/><div class="col-4"><label class="btn btn-secondary active col-12" style="white-space:break-spaces"><input type="radio" class="ahpscore" name="';
                    $text+='option'+$cr+'" id="option'+$a+'" autocomplete="off" checked> '+crit[$a];
                    $text+='</label></div><div class="col-4"><select name="select" id="select" class="form-control ahpscore">';
                    $text+='<option value="1">1</option>';
                    $text+='<option value="2">2</option>';
                    $text+='<option value="3">3</option>';
                    $text+='<option value="4">4</option>';
                    $text+='<option value="5">5</option>';
                    $text+='<option value="6">6</option>';
                    $text+='<option value="7">7</option>';
                    $text+='<option value="8">8</option>';
                    $text+='<option value="9">9</option></select></div><div class="col-4"><label class="btn btn-secondary col-12" style="white-space:break-spaces">';
                    $text+='<input type="radio" class="ahpscore" name="option'+$cr+'" id="option'+$b+'" autocomplete="off">'; 
                    $text+=crit[$b]+'</label></div></div>';
                    $cr+=1;
                };
              };
            }
            $(id).html($text);
    }
    $(document).on('change','#ahp1',function(){
            createAHP("#ahpdiv");
        $("#btnahpEdit").show();
    })
})(jQuery);