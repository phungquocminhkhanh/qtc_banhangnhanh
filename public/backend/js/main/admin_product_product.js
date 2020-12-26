function fileValidation() {
    var fileInput = document.getElementById('product_img');
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



function show_category() {
    let output1 = ""; // output gianh cho lộc sản phẩm theo danh mục hiện trên giao diện chính
    let output2 = ""; //output gianh cho select khi add product
    $.ajax({
        type: "get",
        url: "../admin/product-category",
        dataType: "json",
        success: function(response) {
            $.each(response, function(k, v) {
                output2 += `
                    <option value="${v.id}">${v.category_title}</option>
                `;
                output1 += `<li class="active"><a onclick="show_product_in_category(${v.id})"><i class="fa fa-user"></i>${v.category_title}</a></li>`;

            });
            output1 += `<li class="active"> <button type="button" name="x" id="x" data-toggle="modal" data-target="#add_product_Modal" class="btn btn-warning">Thêm sản phẩm</button></li>`
            $("#id_category").html(output2); //select danh mục khi add product
            $("#content_category").html(output1);

        }
    });
}


function show_unit() {
    let output = "";
    $.ajax({
        type: "get",
        url: "../admin/product-product-unit",
        dataType: "json",
        success: function(response) {
            $.each(response, function(k, v) {
                output += `
                    <option value="${v.id}">${v.unit}</option>
                `;

            });
            $("#id_unit").html(output);

        }
    });
}

function show_product_in_category(id) {
    let output = "";

    $.ajax({
        type: "post",
        url: "../admin/product-product-seach",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token-product-seach"]').attr('content')
        },
        data: { id_category: id },
        dataType: "json",
        success: function(response) {
            console.log(response);
            $.each(response.data, function(k, v) {
                output += `
                <tr onclick="show_detail_product(${v.id})">
                <td class="product-avatar"><img style="border-radius: 30%;height: 163px;width: 163px;" alt="image" src="../${v.product_img}">
                 </td>
                <td> ${v.product_title}
                </td>
                <td> ${v.product_sales_price} VND</td>
                <input type="hidden" id="extra${v.id}" value="${v.product_title}">
                <td class="client-status"><button onclick="edit_category(${v.id})" class="label label-primary" data-toggle="modal" data-target="#edit_account_Modal" >Sửa</button></td>
                <td class="client-status"><button onclick="id_product_extra(${v.id})" class="label label-primary" data-toggle="modal" data-target="#add_product_extra_Modal" >Thêm món kèm</button></td>
                </tr>
                `;


            });
            $("#content-product").html(output);
        }
    });
}

function show_detail_product(id) {
    $.ajax({
        type: "post",
        url: "../admin/product-product-seach",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token-product-detail"]').attr('content')
        },
        data: { id_product: id },
        dataType: "json",
        success: function(response) {
            console.log(response.extra)
            if (response.status == 200) {
                output = `<div id="contact-1" class="tab-pane active">
                                 <div class="row m-b-lg">
                                    <div class="col-lg-8">
                                       <strong>
                                      ${response.product[0].product_title}
                                       </strong>

                                    </div>
                                 </div>
                                 <div class="client-detail">
                                    <div class="full-height-scroll">
                                       <strong>Thông tin</strong>
                                       <ul class="list-group clear-list">
                                          <li class="list-group-item">
                                             ${response.product[0].product_description}
                                             Ngày vào làm
                                          </li>
                                       </ul>
                                       <strong>Món ăn kèm</strong>
                                       <ul class="list-group clear-list">`;
                if (response.extra) {
                    $.each(response.extra, function(k, v) {
                        output += `<div id="extra_detail${v.extra_id}"><li class="list-group-item">${v.extra_title}</li>
                        <a onclick="delete_extra_detail(${v.extra_id})">
            <i class="fa fa-times"></i>
            </a><div>
                        `;
                    });
                    output += `         </ul>
                                                    <hr/>
                                                    <strong id="btn-disable-account">`;
                }


                if (response.product[0].product_disable == 'N')
                    output += `<button type="button" onclick="disable_account(${response.product[0].id},'N')" class="btn btn-danger">Ngừng bán</button></strong>`;
                else
                    output += `<button type="button" onclick="disable_account(${response.product[0].id},'Y')" class="btn btn-secondary">Mở</button></strong>`;


                output += `&nbsp; &nbsp; &nbsp; &nbsp; <button type="button" onclick="change_password(${response.product[0].id})" class="btn btn-danger" data-toggle="modal" data-target="#change_password_account_Modal">Xóa sản phẩm</button></strong>`
                output += `    </div>

                                        </div>
                                </div>`;

                $('#detail-product').html(output)
            }


        }
    });
}

function delete_extra_detail(id) {

    var r = confirm("Bạn có chắc muốn xóa không!");
    if (r == true) {
        $.ajax({
            method: "POST",
            url: "../admin/product-product-delete-extra",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-delete-extra"]').attr('content')
            },
            data: { extra_id: id },
            dataType: "json",
            success: function(response) {

                if (response.status == 200) {
                    alert(response.message);
                    $('#extra_detail' + id).html('');
                }
            }
        });
    }
}

function show_product() {
    let output = "";
    let extra = "";
    $.ajax({
        type: "get",
        url: "../admin/product-product",
        dataType: "json",
        success: function(response) {
            $.each(response, function(k, v) {
                output += `
                <tr onclick="show_detail_product(${v.id})">
                <td class="product-avatar"><img style="border-radius: 30%;height: 163px;width: 163px;" alt="image" src="../${v.product_img}">
                 </td>
                <td> ${v.product_title}
                </td>
                <td> ${v.product_sales_price} VND</td>
                <input type="hidden" id="extra${v.id}" value="${v.product_title}">
                <td class="client-status"><button onclick="edit_category(${v.id})" class="label label-primary" data-toggle="modal" data-target="#edit_account_Modal" >Sửa</button></td>
                <td class="client-status"><button onclick="id_product_extra(${v.id})" class="label label-primary" data-toggle="modal" data-target="#add_product_extra_Modal" >Thêm món kèm</button></td>
                </tr>
                `;
                extra += `<option value="${v.id}">${v.product_title}</option>`;

            });
            $("#content-product").html(output);
            $("#list_extra").html(extra);

        }
    });

}

function id_product_extra(id) {
    $('#extra_content').append(`<input type="hidden" name="id_product" value=${id}>`);
}

function delete_extra(id) {
    var parent = document.getElementById("extra_content");
    var child = document.getElementById('item_extra' + id);
    parent.removeChild(child);
}
$(document).ready(function() {
    show_category();
    show_product();
    show_category()
    show_unit();
    $('#insert_product_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "../admin/product-product",
            method: "POST",
            data: new FormData(this), // su dung khi con file dinh kem
            dataType: 'JSON',
            contentType: false, // su dung khi con file dinh kem
            cache: false, // su dung khi con file dinh kem
            processData: false, // su dung khi con file dinh kem
            success: function(data) {
                if (data.status == 200) {
                    alert(data.message)
                    show_product();
                    $('#close_modol_insert').click();
                }
            }
        })
    });
    $('#insert_product_extra_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "../admin/product-product-extra",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-extra"]').attr('content')
            },
            data: $('#insert_product_extra_form').serialize(),
            dataType: 'JSON',
            success: function(data) {
                if (data.status == 200) {
                    alert(data.message)
                    show_product();
                    $('#close_modol_insert').click();
                }
            }
        })
    });

    $('#list_extra').change(function() {
        id = $(this).val();
        var child = document.getElementById('item_extra' + id);
        if (child != null) {

        } else {
            listextra = `<div id="item_extra${id}"><input value="${id}" type="hidden" name="list_product_extra[]">${$('#extra'+id).val()}<a onclick="delete_extra(${id})" class="close-link">
            <i class="fa fa-times"></i>
            </a><br/></div>`;
            $('#extra_content').append(listextra);
        }

    });
    $("#seach_auto").keyup(function() {
        $.ajax({
            url: "../admin/product-product-seach-auto",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-seach-auto"]').attr('content')
            },
            data: { key_seach: $(this).val() }, // chuyen vao bien name vs du lieu cua input do
            dataType: "json",
            success: function(response) {
                let output = "";
                $.each(response.data, function(k, v) {
                    output += `
                    <tr onclick="show_detail_product(${v.id})">
                    <td class="product-avatar"><img style="border-radius: 30%;height: 163px;width: 163px;" alt="image" src="../${v.product_img}">
                     </td>
                    <td> ${v.product_title}
                    </td>
                    <td> ${v.product_sales_price} VND</td>
                    <input type="hidden" id="extra${v.id}" value="${v.product_title}">
                    <td class="client-status"><button onclick="edit_category(${v.id})" class="label label-primary" data-toggle="modal" data-target="#edit_account_Modal" >Sửa</button></td>
                    <td class="client-status"><button onclick="id_product_extra(${v.id})" class="label label-primary" data-toggle="modal" data-target="#add_product_extra_Modal" >Thêm món kèm</button></td>
                    </tr>
                    `;


                });
                $("#content-product").html(output);

            }
        });
    })
});