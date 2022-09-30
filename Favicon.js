changeFaviconByTheme();

function changeFaviconByTheme(){
    var icon = document.getElementById('icon');
    var isDark = window.matchMedia("(prefers-color-scheme: dark)");
    const logoWhite = "/img/Icon White.svg";
    const logoBlack = "/img/Icon Black.svg";

    if (isDark.matches) {
        icon.href=logoWhite;
    } else {
        icon.href=logoBlack;
    }
}