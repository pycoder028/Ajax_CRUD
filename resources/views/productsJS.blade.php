<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function(){
        //alert();
        $(document).on('click', '.add_product', function(e){
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();
           // console.log(name+price);

           $.ajax({
            url:"{{ route('add.product') }}",
            method: 'post',
            data:{name:name, price:price},
            success:function(res){

            },error:function(err){
                let error = err.responseJSON;
                $.each(error.errors, function(index, value){
                    $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                });
            }

           });

        });
    });
</script>