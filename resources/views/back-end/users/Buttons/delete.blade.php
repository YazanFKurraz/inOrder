                                             {{csrf_field()}}
                                            <a href="javascript:;" id="delete" data-id='{{$user->id }}' onclick="delete_user(this)">
                                        <button type="button" rel="tooltip" title="" class="btn btn-dark btn-link btn-sm" data-original-title="Remove">
                                <i class="material-icons">close</i>
                              </button></a>

@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
   
          var token = $("input[name='csrf-token']").attr("content");
            var token = '{!! csrf_token() !!}';
            var tr = $(this).parent().parent();
   
           function delete_user(event) {
            var id=$(event).data('id'); 
            var self = $(event);

            swal({
                  title: "Are you sure?",
                  text: "Do you want this User ",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                   
                $.ajax(
                   {
                    url: "/admin/users/"+id,
                    type: 'POST',
                    data: {
                        "id": id,
                        "_token": token,
                        "_method":'DELETE'
                    },
                     success: function (data){
                             self.parent().parent().hide();
                         swal("Deleted!", "User Deleted Succsefully.", "success");
                        }
                });
                    
              }
          });
        }
        
    </script>
@endsection                              