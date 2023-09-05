@extends('layouts.app')

@section('content')
@auth
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/viewUser.js')}}"></script>



        
<div class="container containers page-color" >
    <div class="patient-section">
        <div class="row" style="justify-content:center">
            <div class="col-sm-3">
                <label class="form-label">User Type</label>
                    <select class="form-select" id="userType" name="userType">
                        <option value="All">All</option>
                        <option value="Admin">Admin</option>
                        <option value="M&E Manager">M&E Manager</option>
                        <option value="Project Manager">Project Manager</option>
                    </select>
            </div>
            
        </div>
        <div class="row" style="justify-content:center">
            <div class="col-sm-2">
                <button class="btn pt_userViewBtn" onclick="view_user()">View</button>
            </div>
        </div>
        <div class="user-list" id="user_list"></div>
        <div class="update-section" id="update_section" style="display:none">
            <div class="row">
                <div class="col-sm-2">
                    <lable>Name</lable>
                    <select class="form-select" id="name" name="name">
                        <option value=""></option>
                        <option value="Admin">Admin</option>
                        <option value="M&amp;E Manager">M&amp;E Manager</option>
                        <option value="Project Manager">Project Manager</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <lable>Email</lable>
                    <input id="email" type="email" class="form-control " name="email" value="" required="" autocomplete="email">
                </div>
                <div class="col-sm-2">
                    <lable>State</lable>
                    <select class="form-select" id="state" name="state">
                        <option value="-"></option>
                        <option value="Yangon">Yangon</option>
                        <option value="Mandaly">Mandaly</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <lable>Township</lable>
                     <select class="form-select" id="township" name="township">
                        <option value="-"></option>
                    </select>
                </div>
               
            </div>
            <div class="row" style="justify-content:center">
                <div class="col-sm-2">
                    <button class="btn userFinal-update" onclick="updateUser()">Update</button>
                </div>
            </div>
        </div>

    </div>
</div>
@endauth
@endsection
<script type="text/javascript">
  findUser={};let user_data;
    function view_user(){
       findUser={find:$("#userType").val(),
                 notice:"Find User"};
        console.log(findUser);
        $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
        });
        $.ajax({
            type:'POST',
            url:"{{route('user_viewList')}}",
            dataType:'json',
            contentType: 'application/json',
            data: JSON.stringify(findUser),
            success:function(response){
                user_data=response[0];
                if(response[0].length>0){
                    $(".show-user").remove();
                    for(var i=0;i<response[0].length;i++){
                        var userRow=$("<div>").attr({class:"row show-user user-row"+i})
                        .append($("<div>").attr({class:"col-sm-2 view-name"}).append($("<lable>").attr({class:"form-control"}).text(response[0][i]["name"])))
                        .append($("<div>").attr({class:"col-sm-3 view-email"}).append($("<lable>").attr({class:"form-control"}).text(response[0][i]["email"])))
                        .append($("<div>").attr({class:"col-sm-2 view-state"}).append($("<lable>").attr({class:"form-control"}).text(response[0][i]["state"])))
                        .append($("<div>").attr({class:"col-sm-3 view-township"}).append($("<lable>").attr({class:"form-control"}).text(response[0][i]["township"])))
                        .append($("<div>").attr({class:"col-sm-2 view-btn"}).append($("<button>").attr({class:"btn update-btn",id:"Uupdate"+i,onclick:"updateview()"}).text("Update View"))
                        .append($("<button>").attr({class:"btn delete-btn",id:"Udelete"+i,onclick:"delete_user()"}).text("delete"))
                        );
                        $("#user_list").append(userRow);
                    }
                    
                }
                if(cleanedValue=="ProjectManager"){
                    $("button").prop("disabled",true);
                     $(".pt_userViewBtn").prop("disabled",false);
                }
                
            }
        })
    }
    function updateview(){
        var id_number=$(event.target).attr("id").match(/\d+/)[0];
        $("#update_section").show();
        console.log(user_data);
        $("#name").val(user_data[id_number]["name"]);
        $("#email").val(user_data[id_number]["email"]);
        $("#state").val(user_data[id_number]["state"]);
        if(user_data[id_number]["state"]!==null){
            region();
        }
        $("#township").val(user_data[id_number]["township"]);
        $(".userFinal-update").attr({id:id_number});
    }
    function updateUser(){
        var up_uid=$(event.target).attr("id");
        let u_data={};
        update_rid=user_data[up_uid]["id"];
        $("#update_section input, #update_section select").each(function(index){
        var id_name=$(this).attr('id');
        u_data[id_name]=$(this).val();
        })
        u_data["notice"]="User updated";
        u_data["update_rid"]=update_rid;
        console.log(u_data);
        $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
        });
        $.ajax({
            type:'POST',
            url:"{{route('user_viewList')}}",
            dataType:'json',
            contentType: 'application/json',
            data: JSON.stringify(u_data),
            success:function(response){
                alert("SuccessFully Update")
                history.go(0);

            }
        })

    }
    function delete_user(){
        var id_number=$(event.target).attr("id").match(/\d+/)[0];

       var  delete_rid=user_data[id_number]["id"];
        let del_udata={
            delete_rid:delete_rid,
            notice:"Delete User",
        }
        console.log(del_udata);
        $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
        });
        $.ajax({
            type:'POST',
            url:"{{route('user_viewList')}}",
            dataType:'json',
            contentType: 'application/json',
            data: JSON.stringify(del_udata),
            success:function(response){
                alert("SuccessFully Delete")
                history.go(0);

            }
        })


    }
  



</script>