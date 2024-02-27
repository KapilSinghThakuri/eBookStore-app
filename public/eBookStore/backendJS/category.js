$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $(document).on('click','#category_store', function(event) {
        event.preventDefault();
        var formData = {
                'name' : $(".name").val(),
            };
            console.log('Hello');
        $.ajax({
            console.log('Hellodffdshj');

            url: '/AdminDashboard/Category/Store',
            method: 'post',
            data: formData,
            success: function (response) {
                console.log("Hello world!");
                alert('Category Added Successfully!!!');
                $(#category_store).val(" ");
            },
            error: function (){
                alert('Error occurred!!!');
            }
        });
    });
});