
    
$("#chpass").click(function(){
    let arrayError = [];

    let oldpass = $("#oldpass").val();
    let newpass = $("#newpass").val();
    let confnewpass = $("#confnewpass").val();

    console.log(newpass);
    console.log(chpass);

    let regexpass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;


    if(!regexpass.test(newpass) || newpass == ""){
        arrayError.push("New Password must contain at least 1 lowercase character, at least 1 uppercase character, at least 1 numeric character, at least one special character and the string must be 8 characters or longer");
    }

    if(oldpass == newpass){
        arrayError.push("OLD password and NEW password are equal!");
    }

    if(newpass != confnewpass){
        arrayError.push("NEW password and CONFIRM NEW password are not equal!");
    }


    $(".alert").hide();

    if(arrayError.length > 0){
        $(".alert").show();
        let html = "";
        for(let i = 0; i < arrayError.length; i++) {
            html += "<li>" + arrayError[i] + "</li>";
        }
        $(".alert").html(html);
        return false;
    }else{
        return true;
    }

});