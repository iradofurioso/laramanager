    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="container">
    <div class="row">
        <div class="col-md-8">
            @if (Auth::check())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Você está logado!</strong> Utilize o menu lateral.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="javascript:void(0);" class="list-group-item visitor" style="cursor: default;">
                    <h3 class="pull-right">
                        <i class="fa fa-users"></i>
                    </h3>
                    <h4 class="list-group-item-heading count">{{ $qtdClientes }}</h4>
                    <p class="list-group-item-text">
                        Cliente(s)</p>
                </a>
            </div>
        </div>

    </div>
</div>