function responce()
{
   
    document.getElementById('resp').style.borderLeft = " 4px solid #fff";
    document.getElementById('addque').style.borderLeft = " none";
    document.getElementById('addsubject').style.borderLeft = "none";
    document.getElementById('que').style.borderLeft = " none";
    document.getElementById('sub').style.borderLeft = " none";
    document.getElementById('reg').style.borderLeft = " none";

   
    document.getElementById('result').style.display = "flex";
    document.getElementById('addQue').style.display = "none";
    document.getElementById('AddSub').style.display = "none"; 
    document.getElementById('sq').style.display = "none";  
    document.getElementById('quizLi').style.display = "none";
    document.getElementById('userList').style.display = "none";
    
    
}
function addque()
{
    document.getElementById('resp').style.borderLeft = " none";
    document.getElementById('addque').style.borderLeft = " 4px solid #fff";
    document.getElementById('addsubject').style.borderLeft = " none";
    document.getElementById('que').style.borderLeft = " none";
    document.getElementById('sub').style.borderLeft = " none";
    document.getElementById('reg').style.borderLeft = " none";

    document.getElementById('result').style.display = "none";
    document.getElementById('addQue').style.display = "flex";
    document.getElementById('AddSub').style.display = "none";
    document.getElementById('sq').style.display = "none";
    document.getElementById('quizLi').style.display = "none";
    document.getElementById('userList').style.display = "none";
}
function addsub()
{
    document.getElementById('resp').style.borderLeft = " none";
    document.getElementById('addque').style.borderLeft = " none";
    document.getElementById('addsubject').style.borderLeft = " 4px solid #fff";
    document.getElementById('que').style.borderLeft = " none";
    document.getElementById('sub').style.borderLeft = " none";
    document.getElementById('reg').style.borderLeft = " none";

    document.getElementById('result').style.display = "none";
    document.getElementById('addQue').style.display = "none";
    document.getElementById('AddSub').style.display = "flex";
    document.getElementById('sq').style.display = "none";
    document.getElementById('quizLi').style.display = "none";
    document.getElementById('userList').style.display = "none";
}

function showquestion()
{
    document.getElementById('resp').style.borderLeft = " none";
    document.getElementById('addque').style.borderLeft = " none";
    document.getElementById('addsubject').style.borderLeft = " none";
    document.getElementById('que').style.borderLeft = " 4px solid #fff";
    document.getElementById('sub').style.borderLeft = " none";
    document.getElementById('reg').style.borderLeft = " none";

    document.getElementById('result').style.display = "none";
    document.getElementById('addQue').style.display = "none";
    document.getElementById('AddSub').style.display = "none";
    document.getElementById('sq').style.display = "flex";
    document.getElementById('quizLi').style.display = "none";
    document.getElementById('userList').style.display = "none";
}
function Showsubject()
{
    document.getElementById('resp').style.borderLeft = " none";
    document.getElementById('addque').style.borderLeft = " none";
    document.getElementById('addsubject').style.borderLeft = " none";
    document.getElementById('que').style.borderLeft = " none";
    document.getElementById('sub').style.borderLeft = " 4px solid #fff";
    document.getElementById('reg').style.borderLeft = " none";

    document.getElementById('result').style.display = "none";
    document.getElementById('addQue').style.display = "none";
    document.getElementById('AddSub').style.display = "none";
    document.getElementById('sq').style.display = "none";
    document.getElementById('quizLi').style.display = "flex";
    document.getElementById('userList').style.display = "none";
}

function users()
{
    document.getElementById('resp').style.borderLeft = " none";
    document.getElementById('addque').style.borderLeft = " none";
    document.getElementById('addsubject').style.borderLeft = " none";
    document.getElementById('que').style.borderLeft = " none";
    document.getElementById('sub').style.borderLeft = " none";
    document.getElementById('reg').style.borderLeft = " 4px solid #fff";

    document.getElementById('result').style.display = "none";
    document.getElementById('addQue').style.display = "none";
    document.getElementById('AddSub').style.display = "none";
    document.getElementById('sq').style.display = "none";
    document.getElementById('quizLi').style.display = "none";
    document.getElementById('userList').style.display = "flex";
    

    
}