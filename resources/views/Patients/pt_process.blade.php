@extends('layouts.app')

@section('content')
@auth
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/viewUser.js')}}"></script>


        
<div class="container containers page-color" >
    <div class="patient-section">
        <div class="row">
            <div class="col-sm-2">
                <label class="form-label">Name</label>
                <input type="text" class="form-control pt-name " id="pt_name">
            </div>
            <div class="col-md-2">
                <label class="form-label">Email</label>
                <input id="pt_email" type="email" class="form-control @error('email') is-invalid @enderror" name="pt_email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="col-sm-2">
                <label class="form-label">Phone</label>
                <input type="number" class="form-control pt-name " id="pt_phone">
            </div>
            <div class="col-sm-1">
                <label class="form-label">Age</label>
                <input type="number" class="form-control pt-name " id="pt_age">
            </div>
            <div class="col-sm-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control pt-name " id="pt_address">
            </div>
            <div class="col-sm-2">
                <label class="form-label">Township</label>
                <select class="form-select " id="pt_town">
                      <option  value="All">All</option>
                      <option value="Insein">Insein</option><option value="MingalarDon">MingalarDon</option><option value="Hmawbi">Hmawbi</option>
                      <option value="Hlegu">Hlegu</option><option value="Taikkyi">Taikkyi</option><option value="Htantabin">Htantabin</option>
                      <option value="Shwepyithar">Shwepyithar</option><option value="Hlaingtharya">Hlaingtharya</option><option value="Thingangyun">Thingangyun</option>
                      <option value="Yankin">Yankin</option><option value="South Okkalapa">South Okkalapa</option><option value="North Okkalapa">North Okkalapa</option>
                      <option value="Thaketa">Thaketa</option><option value="Dawbon">Dawbon</option><option value="Tamwe">Tamwe</option>
                      <option value="Pazundaung">Pazundaung</option><option value="Botahtaung">Botahtaung</option><option value="Dagon Myothit (South)">Dagon Myothit (South)</option>
                      <option value="Dagon Myothit (North)">Dagon Myothit (North)</option><option value="Dagon Myothit (East)">Dagon Myothit (East)</option>
                      <option value="Dagon Myothit (Seikkan)">Dagon Myothit (Seikkan)</option><option value="Mingalartaungnyunt">Mingalartaungnyunt</option>
                      <option value="Thanlyin">Thanlyin</option><option value="Kyauktan">Kyauktan</option><option value="Thongwa">Thongwa</option>
                      <option value="Kayan">Kayan</option><option value="Twantay">Twantay</option><option value="Kawhmu">Kawhmu</option>
                      <option value="Kungyangon">Kungyangon</option><option value="Dala">Dala</option><option value="Seikgyikanaungto">Seikgyikanaungto</option>
                      <option value="Cocokyun">Cocokyun</option><option value="Kyauktada">Kyauktada</option><option value="Pabedan">Pabedan</option>
                      <option value="Lanmadaw">Lanmadaw</option><option value="Latha">Latha</option><option value="Ahlone">Ahlone</option>
                      <option value="Kyeemyindaing">Kyeemyindaing</option><option value="Sanchaung">Sanchaung</option><option value="Hlaing">Hlaing</option>
                      <option value="Kamaryut">Kamaryut</option><option value="Mayangone">Mayangone</option><option value="Dagon">Dagon</option>
                      <option value="Bahan">Bahan</option><option value="Seikkan">Seikkan</option>
                    </select>
            </div>
        </div>
        <div class="row" style="justify-content:center">
            <div class="col-sm-2">
                <button class="btn pt_addBtn" onclick="add_patient()">ADD Patients</button>
            </div>
            <!-- <div class="col-sm-2">
                <button class="btn pt_exportBtn" onclick="export_patient()">ADD Patients</button>
            </div> -->
            <div class="col-sm-2">
                <button class="btn pt_viewBtn" onclick="view_patient()">View Patient</button>
            </div>
            
        </div>
        <div class="patient_list" style="display:none">
            <div class="row">
                <div class="col-sm-1">
                    <label class="form-label">Name</label>
                </div>
                <div class="col-sm-1">
                    <label class="form-label">Age</label>
                </div>
                <div class="col-sm-2">
                    <label class="form-label">Email</label>
                </div>
                <div class="col-sm-2">
                    <label class="form-label">Phone</label>
                </div>
                <div class="col-sm-2">
                    <label class="form-label">Address</label>
                </div>
                <div class="col-sm-2">
                    <label class="form-label">Township</label>
                </div>
                <div class="col-sm-2">

                </div>
            </div>
        </div>
    </div>
</div>
@endauth
@endsection
<script type="text/javascript">
   let pt_data={};let patient_list={};let update_id,notice;
   
    function add_patient(){
        $(".patient-section input,select").each(function(index){
        var id_name=$(this).attr('id');
        pt_data[id_name]=$(this).val();
        })
        pt_data["notice"]="save"
        if(notice=="Update Patient"){
            pt_data["notice"]=notice;
            pt_data["update_id"]=update_id;

        }
        console.log(pt_data);
        $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
        });
        $.ajax({
            type:'POST',
            url:"{{route('pt_data')}}",
            dataType:'json',
            contentType: 'application/json',
            data: JSON.stringify(pt_data),
            success:function(response){
                console.log(response);
                alert("successfully")
                history.go(0);
                
            }
        })
    }
    function export_patient(){
        var ex_town=$("#pt_town").val();
        let   export_data={ex_town:ex_town,notice:"excel"}
        console.log(export_data);
        $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
        });
        $.ajax({
            type:'POST',
            url:"{{route('pt_data')}}",
            dataType:'json',
            contentType: 'application/json',
            data: JSON.stringify(export_data),
            success:function(response){
                console.log(response);
                
            }
        })
    
    }
    function view_patient(){
        var view_town=$("#pt_town").val();
        let   view_data={view_town:view_town,notice:"View Patient"}
        console.log(view_data);
        $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
        });
        $.ajax({
            type:'POST',
            url:"{{route('pt_data')}}",
            dataType:'json',
            contentType: 'application/json',
            data: JSON.stringify(view_data),
            success:function(response){
                console.log(response);
                patient_list=response[0];
                $(".patient_list").show();
                $(".ptlist-row").remove();

                for (let i = 0; i < response[0].length; i++) {
                    var pt_rowList=$("<div>").attr({class:"row ptlist-row"})
                    .append($("<div>").attr({class:"col-sm-1"}).append($("<label>").attr({class:"form-label"}).text(response[0][i]["name"])))
                    .append($("<div>").attr({class:"col-sm-1"}).append($("<label>").attr({class:"form-label"}).text(response[0][i]["age"])))
                    .append($("<div>").attr({class:"col-sm-2"}).append($("<label>").attr({class:"form-label"}).text(response[0][i]["email"])))
                    .append($("<div>").attr({class:"col-sm-2"}).append($("<label>").attr({class:"form-label"}).text(response[0][i]["phone"])))
                    .append($("<div>").attr({class:"col-sm-1"}).append($("<label>").attr({class:"form-label"}).text(response[0][i]["address"])))
                    .append($("<div>").attr({class:"col-sm-2"}).append($("<label>").attr({class:"form-label"}).text(response[0][i]["township"])))
                    .append($("<div>").attr({class:"col-sm-2"}).append($("<button>").attr({class:"btn pt-update",onclick:"patient_Updateview()",id:i}).text("Update View"))
                    .append($("<button>").attr({class:"btn pt-delete",onclick:"patient_delete()",id:i}).text("Delete")));
                    $(".patient_list").append(pt_rowList);
                    
                }

                if(cleanedValue=="ProjectManager"){
                    $("button").prop("disabled",true);
                    $(".pt_userViewBtn,.pt_viewBtn").prop("disabled",false);
                }
            }
        })
    }
    function patient_Updateview(){
        var patient_viewId=$(event.target).attr("id");
        $("#pt_name").val(patient_list[patient_viewId]["name"]);
        $("#pt_email").val(patient_list[patient_viewId]["email"]);
        $("#pt_phone").val(patient_list[patient_viewId]["phone"]);
        $("#pt_age").val(patient_list[patient_viewId]["age"]);
        $("#pt_town").val(patient_list[patient_viewId]["township"]);
        $("#pt_address").val(patient_list[patient_viewId]["address"]);
        update_id=patient_list[patient_viewId]["id"];
        notice="Update Patient";
        $(".pt_addBtn").text("Update Patient")


    }
    function patient_delete(){
        var delet_rowid=$(event.target).attr("id");
        var del_id=patient_list[delet_rowid]["id"];
        
        var pt_deldata={
            id:del_id,
            notice:"Delete Patient"

        }
        console.log(pt_deldata)
        $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
        });
        $.ajax({
            type:'POST',
            url:"{{route('pt_data')}}",
            dataType:'json',
            contentType: 'application/json',
            data: JSON.stringify(pt_deldata),
            success:function(response){
                alert("Successfully Delete")
                histroy.go(0);
            }
        })

        
    }




</script>