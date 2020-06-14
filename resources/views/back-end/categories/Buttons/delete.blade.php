                                             {{csrf_field()}}
                                            <a href="javascript:;" id="delete" data-id='{{$category->id }}' onclick="delete_categoy(this)">
                                        <button type="button" rel="tooltip" title="" class="btn btn-dark btn-link btn-sm" data-original-title="Remove">
                                <i class="material-icons">close</i>
                              </button></a>

@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
   
          var token = $("input[name='csrf-token']").attr("content");
            var token = '{!! csrf_token() !!}';
            var tr = $(this).parent().parent();
   
           function delete_categoy(event) {
            var id=$(event).data('id'); 
            var self = $(event);

            swal({
                  title: "Are you sure?",
                  text: "Do you want this Category",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                   
                $.ajax(
                   {
                    url: "/admin/categories/"+id,
                    type: 'POST',
                    data: {
                        "id": id,
                        "_token": token,
                        "_method":'DELETE'
                    },
                     success: function (response,data){
                      if (response.status == 200) {
                        swal("Category Deleted Successfully", response.message, "success")
                             self.parent().parent().hide();
                         swal("Deleted!", "Category Deleted Succsefully.", "success");
                        }else
                          swal("Can't Delete this Category", response.message, "error")
                        }
                });
                    
              }
          });
        }
        
    </script>
@endsection                              