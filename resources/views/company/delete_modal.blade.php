<a class="btn btn-danger mb-1" href="#" data-toggle="modal" data-target="#deleteModal{{$com->id}}">
    <i class="fa fa-trash-alt"></i>
    Delete
</a>
<!-- Tambah Modal-->
<div class="modal fade" id="deleteModal{{$com->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Company | Delete</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
            <p>Are you sure to delete <b>{{$com->name}}</b>?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <form action="/companies/{{$com->id}}" method="POST">
                @method('DELETE')
                @csrf
                <input class="btn btn-danger" type="submit" value="Delete" />
            </form> 
        </div>
    </div>
    </div>
</div>