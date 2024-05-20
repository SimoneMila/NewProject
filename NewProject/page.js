const voti = document.getElementsByClassName('table-success');

document.addEventListener("DOMContentLoaded", function(){
    for(let i = 0; i < voti.length; i++){
        if(voti[i].innerHTML < "5"){
            voti[i].classList.add('table-danger');
        }else if(voti[i].innerHTML >= "5" && voti[i].innerHTML <= "5.9"){
            voti[i].classList.add('table-warning');
        }
    }
});

function currentdate(){
    let now = new Date();
    let year = now.getFullYear();
    let month = now.getMonth() + 1;
    let day = now.getDate();
    if(month < 10){
        month = "0" + month;
    }
    let datetime = year + "-" + month + "-" + day;
    let mindatetime = year - 1 + "-09-01";
    document.getElementById("data").setAttribute("max", datetime);
    document.getElementById("data").setAttribute("value", datetime);
    document.getElementById("data").setAttribute("min", mindatetime);
}