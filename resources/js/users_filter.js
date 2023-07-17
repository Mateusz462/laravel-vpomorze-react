// $(function(){
//     $('button.users_filter_button').click(function(){
//         const form = $('form.users_filter_form').serialize();
//         $.ajax({
//             method: 'GET',
//             url: "users",
//             data: form
//         })
//
//             //data:{'search':$value},
//         // success:function(data){
//         //     $('tbody').html(data);
//         // }
//         .done(function (response){
//             $('#table_users tbody').empty();
//             $.each(response.data, function(index, users){
//                 $('tbody').html()
//                 console.log(response);
//             })
//         })
//         .fail(function (data){
//             alert("Error");
//         })
//     })
// })
