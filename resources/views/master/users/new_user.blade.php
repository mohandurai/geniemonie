<div class="modal fade"  id="user_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
                </button>
            </div>
            <div class="modal-body" id="customer-model-body">
                <input type="hidden" name="control_name" id="control_name">
                @include('master.users.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-brand btn-danger mr-2" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-brand btn-primary mr-2" onclick="createUser()" id="save-user">Save
                    changes
                </button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).on('change', "select.item-clr", function () {
            if($( this ).val()==='NEW'){
                $('#control_name').val($(this).attr('name'));
                $('#user_model').modal('show');

            }
        });

        function createUser() {
            var name = ($('input[name="name"]').val());
            var phone_no = ($('input[name="phone_no"]').val());
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{route('users.store')}}",
                data: {
                    name: name,
                    phone_no: phone_no,
                },
                success: function (data) {
                    if (data.error) {
                        $.each(data.error, function (key, value) {
                            $("#" + key).toggleClass("is-invalid");
                            $("#" + key + '_alert').html(value);
                        });
                    } else {
                        if (data.success) {
                            var opt = {
                                id: data.user.id,
                                text: data.user.name
                            };
                            var newOption = new Option(opt.text, opt.id, false, false);
                            $('select[name="' + controlName + '"]').append(newOption).trigger('change');
                            $('select[name="' + controlName + '"]').val(opt.id).trigger('change');
                            $('#control_name').val();
                            $('#user_model').modal('toggle');
                        }
                    }

                }
            });
        }
    </script>
@endpush
