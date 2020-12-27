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
                <td class="client-status"><button onclick="edit_category(${v.id})" class="label label-primary" data-toggle="modal" data-target="#edit_category_Modal" >Sửa</button></td>

                </tr>
                `;

            });
            $("#content-category").html(output)

        }
    });
}

function edit_category(id) {
    $('#id_category').val(id);
    $('#check_upload_image').val(0);
    $.ajax({
        url: "../admin/product-category/" + id,
        method: "GET",
        success: function(data) {
            if (data.status == 200) {
                $.each(data.data, function(k, v) {
                    $('#ecategory_title').val(v.category_title);
                    $img = `<img style="width:100px;height:70px;" src="../${v.category_icon}"/>`;
                    $('#eupload_ed_image').html($img);

                });
            }


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

function fileValidation2() {
    var fileInput = document.getElementById('ecategory_icon');
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
                $("#check_upload_image").val(1);
                document.getElementById('eupload_ed_image').innerHTML = '<img style="width:100px;height:70px;" src="' + e.target.result + '"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
$(document).ready(function() {
    show_category();
    $('#insert_category_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "../admin/product-category",
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
    $('#edit_category_form').on('submit', function(event) {
        event.preventDefault();
        id = $('#id_category').val();
        $.ajax({
            url: "../admin/product-category-update",
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data.status == 200) {
                    alert(data.message)
                        //show_category();
                        //$('#close_modol_edit').click();
                }
            }
        })
    });
});