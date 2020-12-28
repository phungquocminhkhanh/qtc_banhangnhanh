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
<<<<<<< HEAD
                document.getElementById('upload_ed_image').innerHTML = '<img style="width:150px;height:150px;" src="' + e.target.result + '"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function fileValidation2() {
    var fileInput = document.getElementById('eproduct_img');
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
                $('#check_upload_image').val(1);
                document.getElementById('eupload_ed_image').innerHTML = '<img style="width:150px;height:150px;" src="' + e.target.result + '"/>';
=======
                document.getElementById('upload_ed_image').innerHTML = '<img style="width:100px;height:70px;" src="' + e.target.result + '"/>';
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
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
<<<<<<< HEAD
            output1 += `<li class="active"><a onclick="show_product_in_category(0)"><i class="fa fa-user"></i>Tất cả</a></li>`;
=======
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
            $.each(response, function(k, v) {
                output2 += `
                    <option value="${v.id}">${v.category_title}</option>
                `;
                output1 += `<li class="active"><a onclick="show_product_in_category(${v.id})"><i class="fa fa-user"></i>${v.category_title}</a></li>`;

            });
            output1 += `<li class="active"> <button type="button" name="x" id="x" data-toggle="modal" data-target="#add_product_Modal" class="btn btn-warning">Thêm sản phẩm</button></li>`
            $("#id_category").html(output2); //select danh mục khi add product
<<<<<<< HEAD
            //select danh mục khi edit product
=======
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
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
<<<<<<< HEAD
    $("#category_seach_product").val(id); //luu id category tam de gianh cho seach auto
=======

>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
    $.ajax({
        type: "post",
        url: "../admin/product-product-seach",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token-product-seach"]').attr('content')
        },
        data: { id_category: id },
        dataType: "json",
        success: function(response) {
<<<<<<< HEAD
=======
            console.log(response);
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
            $.each(response.data, function(k, v) {
                output += `
                <tr onclick="show_detail_product(${v.id})">
                <td class="product-avatar"><img style="border-radius: 30%;height: 163px;width: 163px;" alt="image" src="../${v.product_img}">
                 </td>
                <td> ${v.product_title}
                </td>
                <td> ${v.product_sales_price} VND</td>
                <input type="hidden" id="extra${v.id}" value="${v.product_title}">
<<<<<<< HEAD
                <td class="client-status"><button onclick="edit_product(${v.id})" class="label label-primary" data-toggle="modal" data-target="#edit_product_Modal" >Sửa</button></td>
=======
                <td class="client-status"><button onclick="edit_category(${v.id})" class="label label-primary" data-toggle="modal" data-target="#edit_account_Modal" >Sửa</button></td>
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
                <td class="client-status"><button onclick="id_product_extra(${v.id})" class="label label-primary" data-toggle="modal" data-target="#add_product_extra_Modal" >Thêm món kèm</button></td>
                </tr>
                `;


            });
            $("#content-product").html(output);
        }
    });
}

<<<<<<< HEAD
function edit_product(id) {
    $('#id_product').val(id);
    $('#check_upload_image').val(0);
    let outputcategory = "";
    let outputunit = "";
    $.ajax({
        url: "../admin/product-product/" + id,
        method: "GET",
        success: function(data) {
            if (data.status == 200) {

                $.each(data.product, function(k, v) {
                    $('#eproduct_title').val(v.product_title);
                    $('#eproduct_sales_price').val(v.product_sales_price);
                    $('#eproduct_description').val(v.product_description);
                    $('#eproduct_code').val(v.product_code);
                    $('#eproduct_point').val(v.product_point);
                    $img = `<img style="width:150px;height:150px;" src="../${v.product_img}"/>`;
                    $('#eupload_ed_image').html($img);
                    $.each(data.category, function(i, c) {
                        if (c.id == v.id_category)
                            outputcategory += ` <option value="${c.id}" selected>${c.category_title}</option>`;
                        else
                            outputcategory += ` <option value="${c.id}">${c.category_title}</option>`;
                    });
                    $.each(data.unit, function(j, u) {
                        if (u.id == v.id_unit)
                            outputunit += ` <option value="${u.id}" selected>${u.unit}</option>`;
                        else
                            outputunit += ` <option value="${u.id}">${u.unit}</option>`;
                    });
                    $("#eid_unit").html(outputunit);
                    $("#eid_category").html(outputcategory);
                });
            }


        }
    });
}



=======
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
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
<<<<<<< HEAD
=======
            console.log(response.extra)
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
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
<<<<<<< HEAD
                                                    <strong id="btn-disable-product">`;
=======
                                                    <strong id="btn-disable-account">`;
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
                }


                if (response.product[0].product_disable == 'N')
<<<<<<< HEAD
                    output += `<button type="button" onclick="disable_product(${response.product[0].id},'Y')" class="btn btn-danger">Ngừng bán</button></strong>`;
                else
                    output += `<button type="button" onclick="disable_product(${response.product[0].id},'N')" class="btn btn-secondary">Mở</button></strong>`;
=======
                    output += `<button type="button" onclick="disable_account(${response.product[0].id},'N')" class="btn btn-danger">Ngừng bán</button></strong>`;
                else
                    output += `<button type="button" onclick="disable_account(${response.product[0].id},'Y')" class="btn btn-secondary">Mở</button></strong>`;
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1


                output += `&nbsp; &nbsp; &nbsp; &nbsp; <button type="button" onclick="change_password(${response.product[0].id})" class="btn btn-danger" data-toggle="modal" data-target="#change_password_account_Modal">Xóa sản phẩm</button></strong>`
                output += `    </div>

                                        </div>
                                </div>`;

                $('#detail-product').html(output)
            }


        }
    });
}

<<<<<<< HEAD
function disable_product(id, status) {
    var r = confirm("Bạn có chắc muốn không !");
    if (r == true) {
        $.ajax({
            url: "../admin/product-product-disable",
            method: "post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-disable-product"]').attr('content')
            },
            data: { id_product: id, status_product: status },
            success: function(data) {
                if (data.success == 200) {
                    if (data.data[0].product_disable == 'N') {
                        $('#btn-disable-product').html(`<button type="button" onclick="disable_product(${data.data[0].id},'Y')" class="btn btn-danger">Vô hiệu hóa</button></strong>`)
                    } else {
                        $('#btn-disable-product').html(`<button type="button" onclick="disable_product(${data.data[0].id},'N')" class="btn btn-secondary">Mở</button></strong>`)
                    }
                    alert("Cập nhật thành công");


                }
            }
        });
    }
}

=======
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
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
<<<<<<< HEAD
                <td class="client-status"><button onclick="edit_product(${v.id})" class="label label-primary" data-toggle="modal" data-target="#edit_product_Modal" >Sửa</button></td>
=======
                <td class="client-status"><button onclick="edit_category(${v.id})" class="label label-primary" data-toggle="modal" data-target="#edit_account_Modal" >Sửa</button></td>
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
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
<<<<<<< HEAD
            data: { key_seach: $(this).val(), id_category: $('#category_seach_product').val() }, // chuyen vao bien name vs du lieu cua input do
=======
            data: { key_seach: $(this).val() }, // chuyen vao bien name vs du lieu cua input do
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
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
<<<<<<< HEAD
                    <td class="client-status"><button onclick="edit_product(${v.id})" class="label label-primary" data-toggle="modal" data-target="#edit_product_Modal" >Sửa</button></td>
=======
                    <td class="client-status"><button onclick="edit_category(${v.id})" class="label label-primary" data-toggle="modal" data-target="#edit_account_Modal" >Sửa</button></td>
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
                    <td class="client-status"><button onclick="id_product_extra(${v.id})" class="label label-primary" data-toggle="modal" data-target="#add_product_extra_Modal" >Thêm món kèm</button></td>
                    </tr>
                    `;


                });
                $("#content-product").html(output);

            }
        });
<<<<<<< HEAD
    });
    $('#edit_product_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "../admin/product-product-update",
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data.status == 200) {
                    alert(data.message)
                    show_product();
                    $('#close_modol_edit').click();
                }
            }
        })
    });
=======
    })
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
});