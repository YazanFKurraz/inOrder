                                             {{csrf_field()}}
                                            <a href="javascript:;" id="delete" data-id='{{$color->id }}' onclick="delete_color(this)">
                                        <button type="button" rel="tooltip" title="" class="btn btn-dark btn-link btn-sm" data-original-title="Remove">
                                <i class="material-icons">close</i>
                              </button></a>

@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
   
          var token = $("input[name='csrf-token']").attr("content");
            var token = '{!! csrf_token() !!}';
            var tr = $(this).parent().parent();
   
           function delete_color(event) {
            var id=$(event).data('id'); 
            var self = $(event);

            swal({
                  title: "Are you sure?",
                  text: "Do you want this Color",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                   
                $.ajax(
                   {
                    url: "/admin/colors/"+id,
                    type: 'POST',
                    data: {
                        "id": id,
                        "_token": token,
                        "_method":'DELETE'
                    },
                     success: function (data){
                             self.parent().parent().hide();
                         swal("Deleted!", "Color Deleted Succsefully.", "success");
                        }
                });
                    
              }
          });
        }
        
    </script>
@endsection                              