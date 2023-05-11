
window.onload = function () {
    var container = document.getElementById("articulos");
    var results = document.getElementById("results");
    function forEach(node, callback) {
        Array.prototype.forEach.call(node.childNodes, callback);
    }
    function searchText(container, search) {
        var total = 0;
        var reg = new RegExp("(" + search + ")", "gi");
        var cleanAllSearchSpans = function (parentNode) {
            forEach(parentNode, function (node) {
                if (node.nodeType === 1) {
                    if (
                        node.nodeName === "SPAN" &&
                        node.dataset.search === "true"
                    ) {
                        parentNode.replaceChild(
                            document.createTextNode(node.innerText),
                            node
                        );
                    } else {
                        cleanAllSearchSpans(node);
                    }
                }
            });
        };
        var highlightSearchInNode = function (parentNode, search) {
            forEach(parentNode, function (node) {
                if (node.nodeType === 1) {
                    highlightSearchInNode(node, search);
                } else if (
                    node.nodeType === 3 &&
                    reg.test(node.nodeValue)
                ) {
                    var matches = node.nodeValue.match(reg);
                    var span = document.createElement("span");
                    span.dataset.search = "true";
                    span.innerHTML = node.nodeValue.replace(reg, "<span class='finded'>$1</span>");
                    parentNode.replaceChild(span, node);
                    total += matches.length;
                }
            });
        };
        cleanAllSearchSpans(container);
        container.normalize();
        highlightSearchInNode(container, search);
        return total;

    }
    //---Al presionar el botón de buscar
    document.getElementById("button").addEventListener("click", function () {
        var search = document.getElementById("search").value;
        if (search.length == 0) return;
        var finded = searchText(container, search);
        results.innerHTML = (finded > 0) ?
            "Veces encontradas: " + finded :
            "No se ha encontrado";
    });
}
