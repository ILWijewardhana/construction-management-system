function search()
{
    var text = document.getElementById("searchBar").value;
    text = text.toLowerCase();
    if(text == 'home')
    {
        window.location = "../HTML/home.html";
    }
    else if(text == 'our work')
    {
        window.location = "../HTML/ourWork.html";
    }
    else if(text == 'admin login')
    {
        window.location = "../HTML/adminLogin.html";
    }
    else if(text == 'employee login')
    {
        window.location = "../HTML/employeeLogin.html";
    }
    else if(text == 'login')
    {
        window.location = "../HTML/login.html";
    }
    else if(text == 'customer support')
    {
        window.location = "../HTML/customerSupport.html";
    }
    else if(text == 'feedback')
    {
        window.location = "../HTML/feedback.php";
    }
    else if(text == 'what we do')
    {
        window.location = "../HTML/whatWeDo.html";
    }
    else if(text == 'about us' || text == 'who we are')
    {
        window.location = "../HTML/aboutUs.html";
    }
    else if(text == 'contact us')
    {
        window.location = "../HTML/contactUs.html";
    }
    else if(text == 'faq')
    {
        window.location = "../HTML/FAQ.html";
    }
    else if(text == 'register')
    {
        window.location = "../HTML/register.html";
    }
    else
    {
        alert("No such webpage available. Try 'home'");
    }
    console.log(text);
}
