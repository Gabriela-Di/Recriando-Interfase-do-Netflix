function validateForm() {
    var pass1 = document.getElementById("id_password1").value;
    var pass2 = document.getElementById("id_password2").value;
    var ok = true;
    console.log(pass1);
    if (pass1 != pass2) {
        alert("Passwords Do not match");
        document.getElementById("id_password1").style.borderColor = "#E34234";
        document.getElementById("id_password2").style.borderColor = "#E34234";
        return false;
    }
    else if (pass1 < 3){
        return false;
    } else{
        return ok;
    }
}