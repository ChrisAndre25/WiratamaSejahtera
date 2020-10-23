@if (count($errors) > 0)
<div class="modal fade show pr-0" style="z-index: 9999;" id="alert" tabindex="-1" role="dialog" aria-labelledby="alertTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title font-weight-bold">Error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 text-center py-3">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-danger"></i>
                            <i class="fas fa-exclamation fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col-12 py-3">
                        <ul class="fa-ul">
                            @foreach ($errors->all() as $error)
                                <li><span class="fa-li"><i class="fas fa-exclamation-triangle text-danger"></i></span>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if (session('error'))
<div class="modal fade show pr-0" style="z-index: 9999;" id="alert" tabindex="-1" role="dialog" aria-labelledby="alertTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title font-weight-bold">Error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 text-center py-3">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-danger"></i>
                            <i class="fas fa-exclamation fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col-12 text-center py-3">
                        <h4 class="font-weight-bold">{{session('error')}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if (session('success'))
<div class="modal fade show pr-0" style="z-index: 9999;" id="alert" tabindex="-1" role="dialog" aria-labelledby="alertTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title font-weight-bold">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 text-center py-3">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-success"></i>
                            <i class="fas fa-check fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col-12 text-center py-3">
                        <h4 class="font-weight-bold">{!! session('success') !!}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<script>
    $('#alert').modal('show');
</script>
