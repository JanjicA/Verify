//CRUD DELETE
$(document).on("click", ".izbrisi-korisnika", function(e){
    e.preventDefault();
    let id = $(this).data('id');

    $.ajax({
       url: "logic/deleteUser.php",
       method: "get",
       dataType: 'json',
       data:{
           id: id
       },
       success: function(data){
            osveziKorisnike();
       },
       error: function(xhr,status){
           console.log(xhr);
       }
    });
});

//CHANGE ACTIVITI - ADMIN
$(document).on("click", ".promeni-korisnika", function(e){
    let id = $(this).data('id');

    $.ajax({
        url: "logic/getOneUser.php",
        method: "get",
        dataType: "json",
        data:{
            id: id
        },
        success: function(data){
            fillFormWithUsers(data);
        },
        error: function(xhr,status,responseText){
            console.log(xhr);
        }
    });
});

function fillFormWithUsers(data){
    $("#hdnIdUserChange").val(data.id);
    $("#isActive").val(data.isActive);
}

function osveziKorisnike(){
    $.ajax({
        url: "logic/getAllUsers.php",
        method: "get",
        dataType: "json",
        success: function(data){
            ispisiKorisnike(data);
        },
        error: function(xhr, status, responseText){
            console.log(xhr);
        }
    });
}


//CHANGE PARAMETER - USERS
$(document).on("click", ".promeni-parametre", function(e){
    let id = $(this).data('id');

    $.ajax({
        url: "logic/getOneUser.php",
        method: "get",
        dataType: "json",
        data:{
            id: id
        },
        success: function(data){
            fillFormWithParameters(data);
        },
        error: function(xhr,status,responseText){
            console.log(xhr);
        }
    });
});

function fillFormWithParameters(data){
    $("#hdnIdUserChange1").val(data.id);
    $("#username").val(data.username);
    $("#email").val(data.email);
}



function ispisiKorisnike(users){
    let u = '', count =  1;
    for(let user of users){
        u += ispisiKorisnika(user, count);
        count++;
    }
    $("#ispis").html(u);
}

function ispisiKorisnika(user){
    return `<tr>
                <td>${user.username}</td>
                <td>${user.email}</td>
                <td>${user.isActive}</td>
                <td>
                    <a href="#" class="btn btn-info promeni-korisnika" data-id="${user.id}" data-toggle="modal" data-target="#myModal">Edit</a>
                    <a href="#" class="btn btn-danger izbrisi-korisnika" data-id="${user.id}">Delete</a>
                </td>
            </tr>`;
}