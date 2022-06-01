       
function file1(){
        var cv = document.getElementById("cv");
        if(cv.files[0]){
        if(cv.files[0].size > 2000000){
        window.alert("Le cv ne doit pas dépacer 2MB!");
        cv.value = "";
        };
        }
}

function file2(){
        var cv = document.getElementById("photo");
        if(cv.files[0]){
        if(cv.files[0].size > 3000000){
        window.alert("La photo ne doit pas dépacer 3MB!");
        cv.value = "";
        };
        }
}

function FilePhotoArticle(){
        var pt = document.getElementById("photo2");
        if(pt.files[0]){
        if(pt.files[0].size > 3000000){
        window.alert("La photo ne doit pas dépacer 3MB!");
        pt.value = "";
        };
        }
}


function form_submit(){
        var rightnbrs = document.getElementById("rightnumbers");

        var usernbrs = document.getElementById("numbers");

        if(usernbrs.value==rightnbrs.innerHTML){
                document.getElementById("add").submit();
        }
        else{
                alert("Veuillez confirmer que vous êtes humain en entrant les nombres!");
        }
}

function form_modify(){
        var rightnbrs = document.getElementById("rightnumbers");

        var usernbrs = document.getElementById("numbers");

        if(usernbrs.value==rightnbrs.innerHTML){
                window.document.getElementById("modiff").submit();
        }
        else{
                window.alert("Veuillez confirmer que vous êtes humain en entrant les nombres!");
        }
}

function form_modify_article(){
        var rightnbrs = document.getElementById("rightnumbers");

        var usernbrs = document.getElementById("numbers");

        if(usernbrs.value==rightnbrs.innerHTML){
                window.document.getElementById("modiff_artic").submit();
        }
        else{
                window.alert("Veuillez confirmer que vous êtes humain en entrant les nombres!");
        }
}

function form_submit_article(){
        var rightnbrs = document.getElementById("rightnumbers");

        var usernbrs = document.getElementById("numbers");
        if(usernbrs.value==rightnbrs.innerHTML){
                window.document.getElementById("article").submit();
        }
        else{
                alert("Veuillez confirmer que vous êtes humain en entrant les nombres!");
        }
}