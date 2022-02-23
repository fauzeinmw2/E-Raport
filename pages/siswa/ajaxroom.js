// JavaScript Document
var ajaxku;
var status;

function cekstatus(nis, status_checked){
    if (status_checked.checked) {
        var status = "aktif";
        console.log(status);
        console.log(nis.toString());
        // console.log(status);

    } else {
        var status = "nonaktif";
        console.log(status);

    }

    ajaxku = createajax();
    var url="pages/siswa/getrom.php";
    url=url+"?nis="+nis;
    url=url+"&status="+status;
    url=url+"&sid="+Math.random();
    // ajaxku.onreadystatechange=programChanged;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
}

// function programChanged(){
//     var data;
//     document.getElementById("djur").innerHTML= "Looading.......";
//     if (ajaxku.readyState==4)
//     {
//         data=ajaxku.responseText;
//         if(data.length>0)
//         {
//             document.getElementById("djur").innerHTML = data
//         }
//         else
//         {
//             document.getElementById("djur").innerHTML= "";
//         }
//     }
//     else
//     {
//         document.getElementById("djur").innerHTML= "Looding";
//     }           
// }                                           
 
function createajax(){
    if (window.XMLHttpRequest){
        return new XMLHttpRequest();
    }
    if (window.ActiveXObject){
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    return null;
}