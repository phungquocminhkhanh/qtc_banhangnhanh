function show_category() {
    let output = "";
    $.ajax({
        type: "get",
        url: "../admin/product-category",
        dataType: "json",
        success: function(response) {
            $.each(response, function(k, v) {
                output += `
                <tr>
                <td class="client-avatar"><img alt="image" src="../${v.category_icon}"> </td>
                <td> ${v.category_title}</td>
                <td class="client-status"><button onclick="edit_category(${v.id})" class="label label-primary" data-toggle="modal" data-target="#edit_account_Modal" >Sửa</button></td>
                <td class="client-status"><button onclick="delete_category(${v.id})" class="label label-primary" data-toggle="modal" data-target="#author_account_Modal" >Phân quyền</button></td>
                </tr>
                `;

            });
            $("#content-category").html(output)

        }
    });
}

function fileValidation() {
    var fileInput = document.getElementById('category_icon');
    var filePath = fileInput.value; //lấy giá trị input theo id
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; //các tập tin cho phép
    //Kiểm tra định dạng
    if (!allowedExtensions.exec(filePath)) {
        alert('Vui lòng upload các icon có định dạng: .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    } else {
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('upload_ed_image').innerHTML = '<img style="width:100px;height:70px;" src="' + e.target.result + '"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
$(document).ready(function() {
    show_category();
    $('#insert_product_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "../admin/product-product",
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data.status == 200) {
                    alert(data.message)
                    show_category();
                    $('#close_modol_insert').click();
                }
            }
        })
    });
});