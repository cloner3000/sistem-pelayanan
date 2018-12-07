@extends('master')
@section('judul',ucfirst($post->judul))

@section('isi')
	<br>
	<br>
	<br>
	<br>
    <div class="container">

	    <div class="row">
	    	<div class="col-md-8">	          
	    		<h3 class="mt-4">{{$post->judul}}</h3>
	          	<hr>
	          	<div class="row">
	          		<div class="col-md-8">
	          			Dipost Pada : {{date('H:i:s d-m-Y',strtotime($post->updated_at))}}
	          		</div>
					<div class="col-md-4">
						<div class="pull-right">
							<a href="" title="">
								<span class="label label-primary">{{$post->kategoris->nama}}</span> 
							</a>
						</div>
					</div>
	          	</div>
	          	<hr>
	          	<img class="img-fluid rounded" src="{{ asset('storage/blog/'.$post->foto) }}" alt="">
	          	<hr>

	          	{!!$post->isi!!}

	          	<hr>

         
		    </div>

	        <div class="col-md-4">
	          
		        <div class="panel panel-info">
		            <h6 class="panel-heading">Cari</h6>
		            <div class="panel-body">
		              <div class="input-group">
		                <form action="{{ route('cari') }}" method="post">
		                	{{csrf_field()}}
		                	<input type="text" class="form-control" placeholder="Cari Berita">
			                <span class="input-group-btn">
			                  <button class="btn btn-secondary" type="submit">Cari</button>
			                </span>
		                </form>
		              </div>
		            </div>
		        </div>

		        <div class="panel panel-info">
		            <h6 class="panel-heading">Kategori</h6>
		            <div class="panel-body">
			            <div class="row">
			                @foreach($kategoris as $k)
			                	<div class="col-lg-6">
					                <ul class="list-unstyled">
					                	<li>
					                	  <a href="#">{{$k->nama}}</a>
					                	</li>
					                </ul>
				                </div>
			                @endforeach
			            </div>
		            </div>
		        </div>

		        </div>
	    </div>
    </div>
@endsection