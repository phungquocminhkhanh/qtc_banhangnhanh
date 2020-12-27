function change_password(id) {
    $('#id_change_password_account').val(id);
}

function show_detail_account(id) {
    $.ajax({
        url: "../admin/account-account-detail",
        method: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token-detail"]').attr('content')
        },
        data: { id_account: id },
        success: function(data) {
            if (data.success == 200) {
                output = `<div id="contact-1" class="tab-pane active">
                                 <div class="row m-b-lg">
                                    <div class="col-lg-8">
                                       <strong>
                                      ${data.data.detail[0].account_fullname}
                                       </strong>

                                    </div>
                                 </div>
                                 <div class="client-detail">
                                    <div class="full-height-scroll">
                                       <strong>Thông tin</strong>
                                       <ul class="list-group clear-list">
                                          <li class="list-group-item">
                                             <span class="pull-right">5-2019</span>
                                             Ngày vào làm
                                          </li>
                                       </ul>
                                       <strong>Quyền</strong>
                                       <ul class="list-group clear-list">`;
                $.each(data.data.permission, function(k, v) {
                    output += `<li class="list-group-item">${v.description}</li>`;
                });
                output += ` </ul>
                                            <hr/>
                                            <strong id="btn-disable-account">`;

                if (data.data.detail[0].account_status == 'Y')
                    output += `<button type="button" onclick="disable_account(${data.data.detail[0].id},'N')" class="btn btn-danger">Vô hiệu hóa</button></strong>`;
                else
                    output += `<button type="button" onclick="disable_account(${data.data.detail[0].id},'Y')" class="btn btn-secondary">Mở lại tài khoản</button></strong>`;


                output += `<button type="button" onclick="change_password(${data.data.detail[0].id})" class="btn btn-light" data-toggle="modal" data-target="#change_password_account_Modal">Đổi mật khẩu</button></strong>`
                output += `    </div>

                                        </div>
                                </div>`

                $('#detail-account').html(output)
            }


        }
    });

}

function disable_account(id, status) {
    var r = confirm("Bạn có chắc muốn không !");
    if (r == true) {
        $.ajax({
            url: "../admin/account-account-disable",
            method: "post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-disable-account"]').attr('content')
            },
            data: { id_account: id, account_status: status },
            success: function(data) {
                if (data.success == 200) {
                    console.log(data.data);
                    if (data.data[0].account_status == 'Y') {
                        $('#btn-disable-account').html(`<button type="button" onclick="disable_account(${data.data[0].id},'N')" class="btn btn-danger">Vô hiệu hóa</button></strong>`)
                    } else {
                        $('#btn-disable-account').html(`<button type="button" onclick="disable_account(${data.data[0].id},'Y')" class="btn btn-secondary">Mở lại tài khoản</button></strong>`)
                    }
                    alert("Cập nhật thành công");
                    show_account();

                }
            }
        });
    }
}

function author_account(id) {
    $(':checkbox').attr('checked', false);
    $('#id_author_account').val(id);
}

function edit_account(id) {
    $.ajax({
        url: "../admin/account-account/" + id,
        method: "GET",
        success: function(data) {
            if (data.success == 200) {
                $.each(data.data, function(k, v) {
                    $('#eusername').val(v.account_username);
                    $('#efullname').val(v.account_fullname);
                    $('#eemail').val(v.account_email);
                    $('#ephone').val(v.account_phone);
                    $("#id_edit_account").val(v.id);
                });
            }


        }
    });

}

function show_account() {
    let output = "";
    $.ajax({
        type: "get",
        url: "../admin/account-account",
        data: "data",
        dataType: "json",
        success: function(response) {
            $.each(response, function(k, v) {
                output += `
                <tr onclick="show_detail_account(${v.id})">
                <td><a data-toggle="tab" href="#contact-1" class="client-link">${v.account_fullname}</a></td>
                <td>${v.type_account}</td>
                <td> ${v.account_phone}</td>
                <td class="client-status"><button onclick="edit_account(${v.id})" class="label label-primary" data-toggle="modal" data-target="#edit_account_Modal" >Sửa</button></td>
                <td class="client-status"><button onclick="author_account(${v.id})" class="label label-primary" data-toggle="modal" data-target="#author_account_Modal" >Phân quyền</button></td>
                </tr>
                `;

            });
            $("#content-account").html(output)

        }
    });



}



$(document).ready(function() {
    show_account();
    $.ajax({
        type: "get",
        url: "../admin/list-account-type",
        data: "data",
        dataType: "json",
        success: function(response) {
            output2 = "";
            $.each(response, function(k, v) {
                output2 += `
                    <option value="${v.id}">${v.type_account}</option>
                `;
            });
            $("#type_account").html(output2);
            $("#etype_account").html(output2);

        }
    });
    $.ajax({
        type: "get",
        url: "../admin/list-permission",
        data: "data",
        dataType: "json",
        success: function(response) {
            output3 = "";
            $.each(response, function(k, v) {
                output3 += `
                        <tr>
                            <th>${v.description}</th>
                            <th><div class="checkbox checkbox-danger">
                                <input value="${v.id}" name="list_permission[]" type="checkbox">
                                 </div>
                            </th>
                        </tr>
                `;
            });
            $("#account_permission").html(output3);

        }
    });

    $('#insert_account_form').on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            url: "../admin/account-account",
            method: "post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-insert"]').attr('content')
            },
            data: $('#insert_account_form').serialize(),
            success: function(data) {
                if (data.success == 200) {
                    alert("Thêm thành công");
                    show_account();
                    $('#close_modol_insert').click();
                }
            }
        });

    });
    $('#edit_account_form').on("submit", function(event) {
        event.preventDefault();
        id = $('#id_edit_account').val();
        $.ajax({
            url: "../admin/account-account/" + id,
            method: "put",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-edit"]').attr('content')
            },
            data: $('#edit_account_form').serialize(),
            success: function(data) {
                if (data.success == 200) {
                    alert("Cập nhật thành công");
                    show_account();
                    $('#close_modol_edit').click();
                }
            }
        });

    });
    $('#author_account_form').on("submit", function(event) {
        event.preventDefault();
        let permission = [];

        $(':checkbox:checked').each(function(i) {
            permission.push($(this).val());
        });

        $.ajax({
            url: "../admin/account-account-permission",
            method: "post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-author"]').attr('content')
            },
            data: { id_account: $('#id_author_account').val(), list_permission: permission },
            success: function(data) {
                if (data.success == 200) {
                    alert("Phân quyền thành công thành công");
                    $('#close_modol_author').click();
                }
            }
        });
    });
    $('#change_password_account_form').on("submit", function(event) {
        event.preventDefault();
        if ($('#epassword_change').val() != $('#epassword_change2').val()) {
            alert("Mật khẩu nhập lại không đúng");
        } else {
            $.ajax({
                url: "../admin/account-account-change-password",
                method: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token-change-password"]').attr('content')
                },
                data: { id_account: $('#id_change_password_account').val(), account_password: $('#epassword_change').val() },
                success: function(data) {
                    if (data.success == 200) {
                        alert("Bạn đã cập nhật tài khoản này thành công");
                        $('#close_modol_changge_password').click();
                    }
                }
            });
        }

    });


});
