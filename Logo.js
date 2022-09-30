logoLink();

function logoLink(){
    var isDark = window.matchMedia("(prefers-color-scheme: dark)"); //gets color scheme media
    const logoWhite = "/img/Icon White.svg"; //set logos path
    const logoBlack = "/img/Icon Black.svg";

    if (isDark.matches) {
        document.getElementById("homeLogo").src = logoWhite; //color scheme is dark so white pic
    } else {
        document.getElementById("homeLogo").src = logoBlack; //color scheme is light so black pic
    }
    return;
}