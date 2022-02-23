// JavaScript Document
var ajaxku;
function getrom(prog, tapel, semester){
    ajaxku = createajax();
    var url="pages/rapor/getrom.php";
    url=url+"?prog="+prog;
    url=url+"&tapel="+tapel;
    url=url+"&semester="+semester;
    url=url+"&sid="+Math.random();
    ajaxku.onreadystatechange=programChanged;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
}

function programChanged(){
    var data;
    document.getElementById("dkelas").innerHTML= "Looading.......";
    if (ajaxku.readyState==4)
    {
        data=ajaxku.responseText;
        if(data.length>0)
        {
            document.getElementById("dkelas").innerHTML = data
        }
        else
        {
            document.getElementById("dkelas").innerHTML= "";
        }
    }
    else
    {
        document.getElementById("dkelas").innerHTML= "Looding";
    }           
}                                           
 
function createajax(){
    if (window.XMLHttpRequest){
        return new XMLHttpRequest();
    }
    if (window.ActiveXObject){
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    return null;
}



// Kelas
var ajaxku;
function getromk(prog, tapel, semester){
    ajaxku = createajaxk();
    var url="pages/rapor/getkelas.php";
    url=url+"?prog="+prog;
    url=url+"&tapel="+tapel;
    url=url+"&semester="+semester;
    url=url+"&sid="+Math.random();
    ajaxku.onreadystatechange=programChangedk;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
}

function programChangedk(){
    var data;
    document.getElementById("tsiswa").innerHTML= "Looading.......";
    if (ajaxku.readyState==4)
    {
        data=ajaxku.responseText;
        if(data.length>0)
        {
            document.getElementById("tsiswa").innerHTML = data
        }
        else
        {
            document.getElementById("tsiswa").innerHTML= "";
        }
    }
    else
    {
        document.getElementById("tsiswa").innerHTML= "Looding";
    }           
}                                           
 
function createajaxk(){
    if (window.XMLHttpRequest){
        return new XMLHttpRequest();
    }
    if (window.ActiveXObject){
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    return null;
}