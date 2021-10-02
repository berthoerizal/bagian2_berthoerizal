<a class="btn btn-success mb-3 ml-3" href="#" data-toggle="modal" data-target="#import">
    <i class="fas fa-file-excel"></i>
    Import Excel
</a>
<!-- Tambah Modal-->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Employees | Import</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>

        <form action="{{ route('import_employees') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Choose File Excel</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Import</button>
            </div>
        </form>
    </div>
    </div>
</div>