@include('eBookStore.adminPanel.header')

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <ul id="saveForm_errlist"></ul>
            <div id="success_message"></div>
            <div class="card">
                <div class="card-header">
                    <h2 style="text-align: center;">
                        Add Books
                    <a href="{{ url('/AdminDashboard')}}" class="btn btn-primary float-right rounded">Back</a>
                    </h2>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>