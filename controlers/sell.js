function search() {
    keyword = document.getElementById('keyword-input').value.toUpperCase();
    tr = document.getElementById("menu").getElementsByTagName("tr");
    for (i = 1; i <= tr.length; i++) {
        id = document.getElementById("id" + i).value;
        text = document.getElementById("name" + i).value;
        if (id.toUpperCase().indexOf(keyword) > -1 || text.toUpperCase().indexOf(keyword) > -1) {
            tr[i - 1].style.display = "";
        } else {
            if (!document.getElementById("check" + i).checked)
                tr[i - 1].style.display = "none";
        }
    }
}

function calprice() {
    tr = document.getElementById("menu").getElementsByTagName("tr");
    total = 0;
    flag = 0;
    oldbill = document.getElementById("bill");
    newbill = document.createElement("tbody");
    table = document.getElementById("table").value;
    for (i = 1; i <= tr.length; i++) {
        quantity = document.getElementById("quantity" + i).value;
        if (document.getElementById("check" + i).checked && quantity != 0) {
            record = document.createElement("tr");

            id = document.getElementById("id" + i).value;
            cell = document.createElement("th");
            temp = document.createTextNode(id);
            cell.appendChild(temp);
            record.appendChild(cell);

            text = document.getElementById("name" + i).value;
            cell = document.createElement("td");
            temp = document.createTextNode(text);
            cell.appendChild(temp);
            record.appendChild(cell);

            uprice = document.getElementById("uprice" + i).value;
            cell = document.createElement("td");
            temp = document.createTextNode(uprice);
            cell.appendChild(temp);
            record.appendChild(cell);

            cell = document.createElement("td");
            temp = document.createTextNode(quantity);
            cell.appendChild(temp);
            record.appendChild(cell);

            price = uprice * quantity;
            total = total + price;
            cell = document.createElement("td");
            temp = document.createTextNode(price);
            cell.appendChild(temp);
            record.appendChild(cell);

            newbill.appendChild(record);
        }
    }
    att = document.createAttribute("id");
    att.value = "bill";
    newbill.setAttributeNode(att);
    document.getElementById("tbbill").replaceChild(newbill, oldbill);
    document.getElementById("total").value = total;
}