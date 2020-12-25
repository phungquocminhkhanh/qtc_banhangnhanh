// $(document).ready(function() {
//     $('#insert_category_form').on("submit", function(event) {
//         event.preventDefault();
//         $.ajax({
//             url: "../admin/product-category",
//             method: "post",
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token-insert"]').attr('content')
//             },
//             data:new FormData(this),
//             success: function(data) {
//                 if (data.success == 200) {
//                     alert("Thêm thành công");
//                     //show_account();
//                     $('#close_modol_insert').click();
//                 }
//             }
//         });

//     });

// });
