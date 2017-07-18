@extends('adminlte::page')

@section('htmlheader_title')
	Uploader une image
@endsection

@section('contentheader_title')
	Uploader une image
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>
                        <div class="box-tools pull-right">
                            {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
											<form class="form-horizontal" role="form" method="POST" action="{{route('images.store')}}" enctype="multipart/form-data">
												{{ csrf_field() }}

												<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
														<label for="title" class="col-md-4 control-label">Titre</label>

														<div class="col-md-6">
																<input id="title" type="text" class="form-control" name="title"  required autofocus>

																@if ($errors->has('title'))
																		<span class="help-block">
																				<strong>{{ $errors->first('title') }}</strong>
																		</span>
																@endif
														</div>
												</div>

												<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
														<label for="content" class="col-md-4 control-label">Description</label>
														<div class="col-md-6">
																<input id="content" type="textarea" class="form-control" name="content"  >

																@if ($errors->has('content'))
																		<span class="help-block">
																				<strong>{{ $errors->first('content') }}</strong>
																		</span>
																@endif
														</div>

														<div class="form-group">
															<div class="col-md-6 col-md-offset-4">
																<label for="image"image></label>
																<input type="file" name="image" accept="image/*" id="image" onchange="loadFile(event)" required>
															</div>
														</div>

														<div class="form-group">
															<div class="col-md-6 col-md-offset-4">
																<img src="" alt="" id="output" style="padding-top:10px;" class="img-rounded img-responsive center-block">
															</div>
														</div>

														<div class="form-group">
															<div class="col-md-6 col-md-offset-4">
																<div class="radio">
																	<label><input type="radio" name="public" value="0" checked>Privée</label>
																</div>
																<div class="radio">
																	<label><input type="radio" name="public" value="1">Publique</label>
																</div>
															</div>
														</div>




												</div>

												<div class="form-group">
														<div class="col-md-6 col-md-offset-4">
																<button type="submit" class="btn btn-primary">
																		Envoyer
																</button>
														</div>
												</div>
										</form>
                    </div>
                    <!-- /.box-body -->
                </div>

			</div>
		</div>
	</div>
@endsection

@section('js')






<script type="text/javascript">
var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>



@endsection
