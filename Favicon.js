changeFaviconByTheme();

function changeFaviconByTheme(){
    var icon = document.getElementById('icon'); //get element
    var isDark = window.matchMedia("(prefers-color-scheme: dark)"); //gets color scheme media
    const logoWhite = "/img/Icon White.svg"; //set logos path
    const logoBlack = "/img/Icon Black.svg";

    if (isDark.matches) {
        icon.href=logoWhite; //color scheme is dark so white pic
    } else {
        icon.href=logoBlack; //color scheme is light so black pic
    }
}