@extends('admin.layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <form method="POST" action="{{ route('reports.store_accounts_receivable') }}">
                    @csrf

                <input type="hidden" name="id_client" value="{{$client->id ?? null}}" readonly>
                <input type="hidden" name="id_vendor" value="{{$vendor->id ?? null}}" readonly>

                <div class="card-header text-center h4">
                        Historial de Cotizaciones
                </div>

                <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <input id="date_begin" type="date" class="form-control @error('date_begin') is-invalid @enderror" name="date_begin" value="{{  date('Y-m-d', strtotime($datebeginyear ?? $date_begin ?? $datenow)) }}" required autocomplete="date_begin">

                                @error('date_begin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="date_end" class="col-sm-1 col-form-label text-md-right">hasta:</label>

                            <div class="col-sm-3">
                                <input id="date_end" type="date" class="form-control @error('date_end') is-invalid @enderror" name="date_end" value="{{ date('Y-m-d', strtotime($date_end ?? $datenow))}}" required autocomplete="date_end">

                                @error('date_end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if (isset($user))
                                <label id="user_label1" for="users" class="col-sm-1 text-md-right">Usuario:</label>
                                <label id="user_label2" name="id_user" value="{{ $user->id }}" for="users" class="col-sm-3">{{ $user->name ?? ''}}</label>
                            @endif
                          
                            
                            <div id="client_label3" class="form-group col-sm-1">
                                <a id="route_select" href="{{ route('reports.select_client') }}" title="Seleccionar Usuario"><i class="fa fa-eye"></i></a>  
                            </div>
                           
                            <div class="col-sm-1">
                            <button type="submit" class="btn btn-primary ">
                                Buscar
                             </button>
                            </div>
                        </div>

                      
                    </form>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ route('historial_quotation.pdf',[$date_begin ?? $datenow,$date_end ?? $datenow,$user->id ?? null]) }}" allowfullscreen></iframe>
                          </div>
                        
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('javascript')

    <script>
    $('#dataTable').DataTable({
        "ordering": false,
        "order": [],
        'aLengthMenu': [[-1, 50, 100, 150, 200], ["Todo",50, 100, 150, 200]]
    });

    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
        $('.sidebar .collapse').collapse('hide');
    };

    let user  = "<?php echo $user->name ?? 0 ?>";  

    if(user != 0){
        $("#user_label1").show();
        $("#user_label2").show();
        $("#user_label3").show();
    }else{
        $("#user_label1").hide();
        $("#user_label2").hide();
        $("#user_label3").hide();
    }

    </script> 

@endsection