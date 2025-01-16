var icon = document.getElementById("theme");
icon.onclick = function()
{
    document.body.classList.toggle("darkTheme");
    if(document.body.classList.contains("darkTheme"))
    {
        icon.src = "../images/darkMode.png";
    }
    else
    {
        icon.src = "../images/lightMode.png";
    }
}
