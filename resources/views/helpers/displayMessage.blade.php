@if (session('success'))
    <div class="alert alert-success alert-dismissable flat">
        <a href="javascript:void(0); " class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('success') }}
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success alert-dismissable flat">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h4><i class="icon fa fa-check"></i> Success</h4>
        {{ session('status') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissable flat">
        <a href="javascript:void(0); " class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('error') }}
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif