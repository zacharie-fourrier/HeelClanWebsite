changeFaviconByTheme();

function changeFaviconByTheme(){
    const icon = document.getElementById('icon');
    const isDark = window.matchMedia("(prefers-color-scheme: dark)");
    const logoWhite = "img/Icon White.svg";
    const logoBlack = "img/Icon Black.svg";

    if (isDark.matches) {
        icon.href=logoWhite;
    } else {
        icon.href=logoBlack;
    }
}