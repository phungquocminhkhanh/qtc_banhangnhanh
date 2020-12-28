function show_customer() {
    output = '';
    $.ajax({
        url: "../admin/get-customer-customer",
        method: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token-customer-list"]').attr('content')
        },
        success: function(data) {
            $.each(data, function(k, v) {
                output += `
                <tr>
                <td><a data-toggle="tab" href="#contact-1" class="client-link">${v.customer_name}</a></td>
                <td>${v.customer_phone}</td>
                <td> ${v.customer_point} điểm</td>
                <td class="client-status"><button onclick="edit_customer(${v.id})" class="label label-primary" data-toggle="modal" data-target="#edit_customer_Modal" >Sửa</button></td>
                </tr>
                `;

            });
            $("#content-customer").html(output)
        }
    });
}

function edit_customer(id) {
    $.ajax({
        url: "../admin/get-customer-customer",
        method: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token-customer-list"]').attr('content')
        },
        data: {
            id_customer: id
        },
        success: function(data) {
            $('#ecustomer_name').val(data[0].customer_name);
            $('#ecustomer_phone').val(data[0].customer_phone);
            $('#ecustomer_address').val(data[0].customer_address);
            $('#ecustomer_code').val(data[0].customer_code);
            $('#id_customer').val(id);
        }
    });
}
$(document).ready(function() {
    show_customer();
    $('#insert_customer_form').on("submit", function(event) {
        event.preventDefault();
        $.ajax({
            url: "../admin/customer-customer",
            method: "post",
            data: $('#insert_customer_form').serialize(),
            success: function(data) {
                if (data.status == 200) {
                    show_customer();
                    alert(data.message);
                    $('#close_modol_insert').click();
                }
            }
        });

    });

    $('#edit_customer_form').on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            url: "../admin/customer-customer/" + $('#id_customer').val(),
            method: "put",
            data: $('#edit_customer_form').serialize(),
            success: function(data) {
                if (data.status == 200) {
                    show_customer();
                    alert(data.message);
                    $('#close_modol_edit').click();
                }
            }
        });

    });

});