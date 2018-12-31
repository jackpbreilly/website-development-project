function loadTOC() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("toc").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "text/toc.txt", true);
    xhttp.send();
}
