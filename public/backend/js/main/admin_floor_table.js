function show_floor() {
    output = "";
    $.ajax({
        url: "../admin/floor",
        method: "get",
        dataType: 'JSON',
        success: function(data) {
            $.each(data, function(k, v) {
                output += `
                    <tr onclick="show_table_floor(${v.id},'${v.floor_title}')">
                    <td> ${v.floor_title}</td>
                    <td class="client-status"><button onclick="edit_floor(${v.id})" class="label label-primary" data-toggle="modal" data-target="#edit_floor_Modal" >Sửa</button></td>
                   <td class="client-status"><button onclick="delete_floor(${v.id})" class="label label-primary">Xóa</button></td>
                    </tr>
                    `;

            });
            $("#content-floor").html(output)
        }
    })
}

function show_table_floor(id, title) {
    output = "";
    output1 = `
                <li class="active"><a data-toggle="tab" onclick="show_table_floor(${id},'${title}')"><i class="fa fa-user"></i>${title}</a></li>
                <li class="active"> <button type="button" name="x" id="x" data-toggle="modal" data-target="#add_table_Modal" class="btn btn-warning">Thêm bàn</button></li>`;
    $("#select-floor").html(output1);
    $("#id_floor_table").val(id);
    $.ajax({
        url: "../admin/get-table",
        method: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token-show-floor-table"]').attr('content')
        },
        data: { id_floor: id },
        dataType: 'JSON',
        success: function(data) {
            $.each(data, function(k, v) {
                output += `
                <tr>
                <td> ${v.table_title} - ${v.floor_title} </td>
                <td class="client-status"><button onclick="edit_table(${v.id})" class="label label-primary" data-toggle="modal" data-target="#edit_table_Modal" >Sửa</button></td>
                <td class="client-status"><button onclick="delete_table(${v.id})" class="label label-primary">Xóa</button></td>
                </tr>
                `;
            });
            $("#content-table").html(output)
        }
    })

}

function delete_floor(id) {
    var r = confirm("Bạn có chắc muốn xóa không !");
    if (r == true) {
        $.ajax({
            url: "../admin/floor/" + id,
            method: "delete",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-delete-floor"]').attr('content')
            },
            dataType: 'JSON',
            success: function(data) {
                if (data.status == 200) {
                    alert(data.message);
                    show_floor();
                    show_table();
                }
            }
        })
    }
}

function show_table() {
    output11 = `
                <li class="active"><a data-toggle="tab" onclick="show_table()" ><i class="fa fa-user"></i>Tất cả-`;
    output12 = "";
    $.ajax({
        url: "../admin/table",
        method: "get",
        dataType: 'JSON',
        success: function(data) {
            $.each(data, function(k, v) {
                output12 += `
                <tr>
                <td> ${v.table_title} - ${v.floor_title} </td>
                <td class="client-status"><button onclick="edit_table(${v.id})" class="label label-primary" data-toggle="modal" data-target="#edit_table_Modal" >Sửa</button></td>
                <td class="client-status"><button onclick="delete_table(${v.id})" class="label label-primary" >Xóa</button></td>
                </tr>
                `;
            });
            output11 += `${data.length} Bàn</a></li>`;
            $("#content-table").html(output12);
            $("#select-all").html(output11);

        }
    })

}

function delete_table(id) {
    var r = confirm("Bạn có chắc muốn xóa không !");
    if (r == true) {
        $.ajax({
            url: "../admin/table/" + id,
            method: "delete",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-delete-table"]').attr('content')
            },
            dataType: 'JSON',
            success: function(data) {
                if (data.status == 200) {
                    alert(data.message);
                    show_table();
                }
            }
        })
    }

}

function edit_table(id) {
    $.ajax({
        url: "../admin/table/" + id,
        method: "get",
        dataType: 'JSON',
        success: function(data) {
            $.each(data, function(k, v) {
                $('#etable_title').val(v.table_title);
                $('#id_table').val(v.id);
            });
        }
    })
}

function edit_floor(id) {
    $.ajax({
        url: "../admin/floor/" + id,
        method: "get",
        dataType: 'JSON',
        success: function(data) {
            $.each(data, function(k, v) {
                $('#efloor_title').val(v.floor_title);
                $('#efloor_priority').val(v.floor_priority);
                $('#id_floor').val(v.id);
            });
        }
    })
}
$(document).ready(function() {
    show_floor();
    show_table();
    $('#insert_floor_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "../admin/floor",
            method: "POST",
            data: $('#insert_floor_form').serialize(),
            dataType: 'JSON',
            success: function(data) {
                if (data.status == 200) {
                    alert(data.message);
                    show_floor();
                    $('#close_modol_insert_floor').click();
                }
            }
        })
    });
    $('#edit_floor_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "../admin/floor/" + $("#id_floor").val(),
            method: "PUT",
            data: $('#edit_floor_form').serialize(),
            dataType: 'JSON',
            success: function(data) {
                if (data.status == 200) {
                    alert(data.message);
                    show_floor();
                    $('#close_modol_edit_floor').click();
                }
            }
        })
    });
    $('#insert_table_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "../admin/table",
            method: "post",
            data: $('#insert_table_form').serialize(),
            dataType: 'JSON',
            success: function(data) {
                if (data.status == 200) {
                    alert(data.message);
                    show_table();
                    $('#close_modol_insert_table').click();
                }
            }
        })
    });
    $('#edit_table_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "../admin/table/" + $("#id_table").val(),
            method: "put",
            data: $('#edit_table_form').serialize(),
            dataType: 'JSON',
            success: function(data) {
                if (data.status == 200) {
                    alert(data.message);
                    // show_floor();
                    $('#close_modol_edit_table').click();
                    show_table();
                }
            }
        })
    });
});