function createItem() {
    send("post", { "text": document.getElementById('text').value });
}

function toggleItemStatus(itemID) {
    send("put", { "id": itemID });
}

function deleteItem(itemID) {
    send("delete", { "id": itemID });
}

function send(methodName, hash) {
    var form = document.createElement("form");
    document.body.appendChild(form);
    form.method = "post";
    form.action = "index.php";

    var method = document.createElement("input");         
    method.name="_method"
    method.value = methodName;
    method.type = 'hidden'
    form.appendChild(method);

    var value = document.createElement("input");         
    value.name="value"
    value.value = JSON.stringify(hash);
    value.type = 'hidden'
    form.appendChild(value);
    
    form.submit();
}