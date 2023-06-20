let checkbox = document.querySelectorAll("input.checkSort");
let checked = [];
let unchecked = [];
let dataExportCheckbox = document.querySelectorAll("input[name='export_columns_selector\[\]']");

dataExportCheckbox.forEach(item => {
    item.removeAttribute("checked")
})

checkbox.forEach(item => {
    let dataID = item.getAttribute('data-key');

    if (item.checked) {
        checked.push(item.getAttribute('column'))
        document.querySelector("input[data-key='" + dataID + "']").setAttribute("checked", true);
    } else {
        unchecked.push(item.getAttribute('column'));
    }

    item.addEventListener('click', function (e) {

        checked = [];
        unchecked = [];
        for (var i = 0; checkbox[i]; ++i) {
            if (checkbox[i].checked) {
                checked.push(checkbox[i].getAttribute('column'));

            } else {
                unchecked.push(checkbox[i].getAttribute('column'));
                document.querySelector("input[data-key='" + dataID + "']").removeAttribute("checked");
            }
        }
    })
})

// console.log(unchecked);

setInterval(function () {
    unchecked.forEach(item => {
        let dataSortHeader = document.querySelector("a[data-sort='" + item + "']");
        if (dataSortHeader) {
            dataSortHeader.parentNode.setAttribute("hidden", true);
        }


        let dataSortData = document.querySelectorAll("div[data-col='" + item + "']");
        dataSortData.forEach(data => {
            data.parentNode.setAttribute("hidden", true);
        })

        let exportDataID = document.querySelector("input[column='" + item + "']").getAttribute("data-key");
        let exportData = document.querySelector("input[data-key='" + exportDataID + "']");
        exportData.removeAttribute("checked");

        // let searchModel = document.querySelector("input[name='AccountsSearch\[" + item + "\]']").parentNode
        // searchModel.setAttribute("hidden", true);

    })
    checked.forEach(item => {
        let dataSortHeader = document.querySelector("a[data-sort='" + item + "']");
        if (dataSortHeader) {
            dataSortHeader.parentNode.removeAttribute("hidden");
        }


        let dataSortData = document.querySelectorAll("div[data-col='" + item + "']");
        dataSortData.forEach(data => {
            data.parentNode.removeAttribute("hidden");
        })

        let exportDataID = document.querySelector("input[column='" + item + "']").getAttribute("data-key");
        let exportData = document.querySelector("input[data-key='" + exportDataID + "']");
        exportData.setAttribute("checked", true);

        // let searchModel = document.querySelector("input[name='AccountsSearch\[" + item + "\]']").parentNode
        // searchModel.removeAttribute("hidden");
    })
}, 200);


let checkboxes = document.querySelectorAll('.register_id');
let deleteBtn = document.querySelector('.delete');

deleteBtn.addEventListener('click', function () {
let arr = [];    
for (var i = 0; checkboxes[i]; ++i) {
    if (checkboxes[i].checked) {
        arr.push(checkboxes[i].value);        
    }
}
if (arr.length == 0) {
    alert('Выберите');    
} else {
    $.ajax({
        url: "/product/delete-check",            
        data: {data: arr},            
        success: function (data) {

        }
    });       
    document.location.reload();    
} 
})