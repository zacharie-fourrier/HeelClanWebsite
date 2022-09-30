logoLink();

function logoLink(){
    var isDark = window.matchMedia("(prefers-color-scheme: dark)");
    const logoWhite = "/img/Icon White.svg";
    const logoBlack = "/img/Icon Black.svg";

    if (isDark.matches) {
        document.getElementById("homeLogo").src = logoWhite;
    } else {
        document.getElementById("homeLogo").src = logoBlack;
    }
    return;
}