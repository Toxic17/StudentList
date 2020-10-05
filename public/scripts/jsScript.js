let ths = document.getElementsByTagName("th");
let next = document.getElementsByClassName("next")[0];
let prev = document.getElementsByClassName("prev")[0];
let pagLinks = document.getElementsByClassName("pagLinks");
let tds = document.getElementsByTagName("td");

function getUrlName(name) {
    if (name = (new RegExp('[?&]' + encodeURIComponent(name) + '=([^&]*)')).exec(location.search))
        return decodeURIComponent(name[1]);
}

if (next !== undefined && prev !== undefined) {
    pagHelp();
}

function pagHelp() {
    pagLinks[0].classList.add("active")

    for (let i = 1; i <= pagLinks.length; i++) {
        if(getUrlName("pag") == i)
        {
            pagLinks[0].classList.remove("active");
            pagLinks[i-1].classList.add("active");
        }
    }

    if (pagLinks[0].classList.contains("active")) {
        prev.classList.add("disabled");
    }
    if (pagLinks[pagLinks.length - 1].classList.contains("active")) {
        next.classList.add("disabled");
    }
}

function checkLink(name) {
    let upPointer = document.createElement("span");
    upPointer.innerHTML = "&#9660";

    if (name.firstChild.href.indexOf(getUrlName("order")) !== -1) {
        if (getUrlName("by") == "ASC") {
            name.firstChild.href = name.firstChild.href.replace("ASC", "DESC");
            upPointer.innerHTML = "&#9650";
            ths[5].lastChild.innerHTML = "";
        } else if (getUrlName("by") == "DESC") {
            name.firstChild.href = name.firstChild.href.replace("DESC", "ASC");
            ths[5].lastChild.innerHTML = "";
        }
        name.appendChild(upPointer);
    }
}

    if(getUrlName("search") !== null && getUrlName("search") !== undefined && getUrlName("search") !== ""){
        for(let i = 0;i < tds.length;i++)
        {
            if(tds[i].innerText.toLowerCase().indexOf(getUrlName("search").toLowerCase()) !== -1)
            {
                tds[i].innerHTML = "<mark>" + tds[i].innerHTML + "</mark>";
            }
        }
    }

for (let i = 0; i < ths.length; i++) {
    if (ths[i].firstChild.href.indexOf("DESC") !== -1) {
        ths[i].firstChild.href = ths[i].firstChild.href.replace("DESC", "ASC");
    }
    ths[i].addEventListener("click", checkLink(ths[i]));
}
