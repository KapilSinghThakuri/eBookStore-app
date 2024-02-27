
// <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
// <script type="text/javascript">

// $(document).ready(function () {
//     $(document).on('click','#category_add', function(event) {
//         event.preventDefault();
//         // console.log('Hello World!!!');
//         var formData = {
//             'name': $('.name').val(),
//         }
//         // console.log(formData);
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
//         $.ajax({
//             type: "POST",
//             url: "/AdminDashboard/Category/Store",
//             data: formData,
//             dataType: "json",
//             success: function (response) {
//                 console.log(response);
//                 if (response.status == 400) {
//                     $('#saveForm_errlist').html("");
//                     $('#saveForm_errlist').addClass('alert alert-danger');
//                     $.each(response.errors, function (key, error_values){
//                         $('#saveForm_errlist').append('<li>'+error_values+'</li>');
//                     });
//                 }
//                 else{
//                     $('#success_message').html("");
//                     $('#success_message').text(response.message);
//                     $('#success_message').addClass('alert alert-success');
//                     $('#category_store').find('input').val("");
//                 }
//             }
//         });
//     });
// });
// </script>