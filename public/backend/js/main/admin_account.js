function show_detail_account() {
    console.log(khanhkhanh);
    var output = `<div id="contact-1" class="tab-pane active">
                                 <div class="row m-b-lg">
                                    <div class="col-lg-4 text-center">
                                       <h2>Nicki Smith</h2>
                                       <div class="m-b-sm">
                                       <img alt="image" class="img-circle" src="../backend/img/ronaldo.jpg"
                                       style="width: 62px">
                                       </div>
                                    </div>
                                    <div class="col-lg-8">
                                       <strong>
                                       About me
                                       </strong>
                                       <p>
                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                          tempor incididunt ut labore et dolore magna aliqua.
                                       </p>
                                       <button type="button" class="btn btn-primary btn-sm btn-block"><i
                                          class="fa fa-envelope"></i> Send Message
                                       </button>
                                    </div>
                                 </div>
                                 <div class="client-detail">
                                    <div class="full-height-scroll">
                                       <strong>Last activity</strong>
                                       <ul class="list-group clear-list">
                                          <li class="list-group-item">
                                             <span class="pull-right"> 12:00 am </span>
                                             Write a letter to Sandra
                                          </li>
                                       </ul>
                                       <strong>Notes</strong>
                                       <p>
                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                          tempor incididunt ut labore et dolore magna aliqua.
                                       </p>
                                       <hr/>
                                       <strong>Timeline activity</strong>
                                    </div>
                                 </div>
                        </div>`

    $('#detail-account').html(output)
}

function author_account(id) {

    console.log("author")
    $("btn_author").click(function(e) {
        e.preventDefault();
        let permission = []

        console.log(111111);
    });
    // $('#author_account_form').on("submit", function(event) {
    //     $(':checkbox:checked').each(function(i) {
    //         console.log($(this).val());
    //     });
    //     event.preventDefault();
    //     $.ajax({
    //         url: "../admin/account-account-permission",
    //         method: "post",
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         data: { id_account: id, list_permission: permission },
    //         success: function(data) {
    //             if (data.success == 200) {
    //                 console.log(data)
    //                 alert("Cập nhật thành công");
    //                 //show_account();
    //             }
    //         }
    //     });

    // });
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
                });
            }


        }
    });
    $('#edit_account_form').on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            url: "../admin/account-account/" + id,
            method: "put",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $('#edit_account_form').serialize(),
            success: function(data) {
                if (data.success == 200) {
                    alert("Cập nhật thành công");
                    show_account();
                }
            }
        });

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
                <tr>
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
    show_account();
    $('#insert_account_form').on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            url: "../admin/account-account",
            method: "post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $('#insert_account_form').serialize(),
            success: function(data) {
                if (data.success == 200) {
                    alert("Thêm thành công");
                    show_account();
                }
            }
        });

    });
});