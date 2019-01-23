@extends('master')
@section('judul','Berita')

@section('isi')
	<br>
	<br>
	<br>
	<br>
    <div class="container">

	    <div class="row">
	    	<div class="col-md-8">
		    	@foreach($posts as $p)
				    <div class="post">
				    	<div class="post-body">
				    		<div class="row">
				    			<div class="col-md-4">
				    				<a href="{{ route('detail',$p->slug) }}">
				    					<img src="{{ asset('storage/blog').'/'.$p->foto }}" class="img-thumbnail">
				    				</a>
				    			</div>
				    			<div class="col-md-8">
				    				<a href="{{ route('detail',$p->slug) }}">
				    					<h4>{{$p->judul}}</h4>
				    				</a>
								    <p>{{$p->deskripsi}}</p>
								    <p class="pull-left">
								    	<a href="{{ route('detail',$p->slug) }}" class="">Selengkapnya</a>
								    </p>
				    			</div>
				    			<div class="post-footer">
									<div class="row">
										<div class="col-md-6 col-sm-6">
											<span class="badge">Diposting : {{date('d-m-Y H:i:s',strtotime($p->created_at))}}</span>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="pull-right"> 
												<a href="{{ route('kategori',$p->kategoris->slug) }}" title="">
													<span class="label label-primary">{{$p->kategoris->nama}}</span>
												</a>
											</div> 
										</div>
									</div>        
								</div>
				    		</div>
				    	</div>
				    </div>
		    	@endforeach
		    	<div class="pull-right">
	              	{!! $posts->render('vendor.pagination.default') !!}
	             </div>
		    </div>

	        <div class="col-md-4">
	          
		        <div class="panel panel-info">
		            <h6 class="panel-heading">Cari</h6>
		            <div class="panel-body">
		              <form action="{{ route('cari') }}" method="post">
		                	{{csrf_field()}}
		                	<div class="input-group">
			                	<input type="text" name="cari" class="form-control" placeholder="Cari Berita">
				                <span class="input-group-btn">
				                  <button class="btn btn-secondary" type="submit">Cari</button>
				                </span>
		              		</div>
		                </form>
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
					                	  <a href="{{ route('kategori',$k->slug) }}">{{$k->nama}}</a>
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