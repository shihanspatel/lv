function showbutton(){
    var button=document.getElementById('zoomin');
    button.style.display='block';
}
function showbutton2(){
    var button=document.getElementById('zoomin2');
    button.style.display='block';
}
function showbutton3(){
    var button=document.getElementById('zoomin3');
    button.style.display='block';
}
function hidebutton(){
    var button=document.getElementById('zoomin');
    button.style.display='none';
}
function hidebutton2(){
    var button=document.getElementById('zoomin2');
    button.style.display='none';
}
function hidebutton3(){
    var button=document.getElementById('zoomin3');
    button.style.display='none';
}
function fullimage($imagepath){
    var container=document.getElementById('fullimage');
    container.style.display='block';
    var image=document.getElementById('full_image');
    image.src=$imagepath;
    var container2=document.getElementById('main');
    container2.style.display='none';
}
function showzoomoutbutton(){
    var button=document.getElementById('zoomout');
    button.style.display='block';
}
function hidezoomoutbutton(){
    var button=document.getElementById('zoomout');
    button.style.display='none';
}
function back(){
    var container=document.getElementById('fullimage');
    container.style.display='none';
    var container2=document.getElementById('main');
    container2.style.display='block';
}