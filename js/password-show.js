document.getElementById("showPassword").addEventListener("click", function(){
    let textInBtn = document.getElementById("showPassword").innerText;
    if(textInBtn == "Show Password"){
        document.getElementById("password").setAttribute("type", "text");
        document.getElementById("showPassword").innerText = "Hide Password";
    }
    else{
        document.getElementById("password").setAttribute("type", "password");
        document.getElementById("showPassword").innerText = "Show Password";

    }
});