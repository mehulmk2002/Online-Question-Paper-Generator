function logout(){
  location.replace("logout.php");
  
 }
function onDashboard() {
  document.getElementById('dash').style.borderLeft = " 4px solid #fff";
  document.getElementById('history').style.borderLeft = " none";
  document.getElementById('editp').style.borderLeft = " none";
  document.getElementById('chpwd').style.borderLeft = "none";

  document.getElementById('result').style.display = "none";
  document.getElementById('editProfile').style.display = "none";
  document.getElementById('cpwd').style.display = "none";
  document.getElementById('profilesec').style.display = "none";
  document.getElementById('grid').style.display = "grid";

}

function onHistory() {
  document.getElementById('dash').style.borderLeft = " none";
  document.getElementById('history').style.borderLeft = " 4px solid #fff";
  document.getElementById('editp').style.borderLeft = " none";
  document.getElementById('chpwd').style.borderLeft = "none";

  document.getElementById('result').style.display = "flex";
  document.getElementById('editProfile').style.display = "none";
  document.getElementById('cpwd').style.display = "none";
  document.getElementById('profilesec').style.display = "none";
  document.getElementById('grid').style.display = "none";

}

function onEdit() {
  document.getElementById('dash').style.borderLeft = " none";
  document.getElementById('history').style.borderLeft = " none";
  document.getElementById('editp').style.borderLeft = " 4px solid #fff";
  document.getElementById('chpwd').style.borderLeft = "none";

  document.getElementById('result').style.display = "none";
  document.getElementById('editProfile').style.display = "flex";
  document.getElementById('cpwd').style.display = "none";
  document.getElementById('profilesec').style.display = "none";
  document.getElementById('grid').style.display = "none";
}


function changePwd() {
  document.getElementById('dash').style.borderLeft = " none";
  document.getElementById('history').style.borderLeft = " none";
  document.getElementById('editp').style.borderLeft = " none";
  document.getElementById('chpwd').style.borderLeft = " 4px solid #fff";

  document.getElementById('result').style.display = "none";
  document.getElementById('editProfile').style.display = "none";
  document.getElementById('cpwd').style.display = "flex";
  document.getElementById('profilesec').style.display = "none";
  document.getElementById('grid').style.display = "none";
}

function myacc() {
  //document.getElementById('quizLi').style.display = "none";
  document.getElementById('result').style.display = "none";
  document.getElementById('editProfile').style.display = "none";
  document.getElementById('cpwd').style.display = "none";
  document.getElementById('profilesec').style.display = "block";
  document.getElementById('grid').style.display = "none";
}




