@extends('site.app')
@section('title', 'products')
@section('content')
<section class="section-content bg padding-y">
    <div class="container">
    <div class="row">
    <aside class="col-sm-3">
    <div class="card card-filter">
    <article class="card-group-item">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse33">
                                <i class="icon-action fa fa-chevron-down"></i>
                                <h6 class="title">By Price  </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse33">
                            <div class="card-body">
                                <input type="range" class="custom-range" min="0" max="100" name="">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Min</label>
                                        <input class="form-control" placeholder="$0" type="number">
                                    </div>
                                    <div class="form-group text-right col-md-6">
                                        <label>Max</label>
                                        <input class="form-control" placeholder="$1,0000" type="number">
                                    </div>
                                </div>
                                <!-- form-row.// -->
                                <button class="btn btn-block btn-outline-primary">Apply</button>
                            </div>
                            <!-- card-body.// -->
                        </div>
                        <!-- collapse .// -->
                    </article>
                    <article class="card-group-item">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse44">
                                <i class="icon-action fa fa-chevron-down"></i>
                                <h6 class="title">By Feature </h6>
                            </a>
                        </header>
                     
                       
                        <div class="filter-content collapse show" id="collapse44">
                        @foreach($categories as $category)
                            <div class="card-body">
                           
                                <form>
                                
                                    <label for="categories" class="form-check">
                                        <input class="form-check-input" id="categories" value="{{$category->id}}" type="checkbox">
                                        <span class="form-check-label">
                                      {{ $category->name }}
                                        </span>
                                    </label>
                                    <!-- form-check.// -->
                              
                                </form>
                               
                            </div>
                            <!-- card-body.// -->
                            @endforeach
                        </div>
                        
                        
                        
                        <!-- collapse .// -->
                    </article>
                    <!-- card-group-item.// -->
                    <article class="card-group-item">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse45">
                                <i class="icon-action fa fa-chevron-down"></i>
                                <h6 class="title">By Brand </h6>
                            </a>
                        </header>
                   
                       
                        <div class="filter-content collapse show" id="collapse45">
                        @foreach($brands as $brand)
                            <div class="card-body">
                            
                                <form>
                                
                                    <label for="brand_id" class="form-check">
                                    
                                        <input class="form-check-input" id="brand_id" value="{{$brand->id}}" type="checkbox">
                                        <span class="form-check-label">
                                      {{ $brand->name }}
                                        </span>
                                       
                                    </label>
                                    <!-- form-check.// -->
                                   
                                </form>
                                
                            </div>
                            <!-- card-body.// -->
                            @endforeach 
                        </div>
                       
                        
                        <!-- collapse .// -->
                    </article>
                   <article class="card-group-item">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse46">
                                <i class="icon-action fa fa-chevron-down"></i>
                                <h6 class="title">By att </h6>
                            </a>
                        </header>
                       
                        
                        <div class="filter-content collapse show" id="collapse46">
                            <div class="card-body">
                            @foreach($attributes as $attribute)
                                <form>
                                    <label for="parent" class="form-check">
                                        <input class="form-check-input" id="parent" value="{{$attribute->id}}" type="checkbox">
                                        <span class="form-check-label">
                                      {{ $attribute->name }}
                                      
                                        </span>
                                    </label>
                                    <!-- form-check.// -->
                              
                                </form>
                                @endforeach
                        
                            </div>
                            <!-- card-body.// -->
                        </div>
                     
                        
                        <!-- collapse .// -->
                    </article>
                    
                    <article class="card-group-item">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse47">
                                <i class="icon-action fa fa-chevron-down"></i>
                                <h6 class="title">By att </h6>
                            </a>
                        </header>
                       
                        
                        <div class="filter-content collapse show" id="collapse47">
                            <div class="card-body">
                            @foreach($attribute_values as $attribute_Value)
                                <form>
                                    <label for="values" class="form-check">
                                        <input class="form-check-input" id="values" value="{{$value->id}}" type="checkbox">
                                        <span class="form-check-label">
                                      {{ $attributeValue->value }}
                                      
                                        </span>
                                    </label>
                                    <!-- form-check.// -->
                              
                                </form>
                                @endforeach
                        
                            </div>
                            <!-- card-body.// -->
                        </div>
                     
                        
                        <!-- collapse .// -->
                    </article> 
                </div>
                <!-- card.// -->

            </aside>
                    
                    <main class="col-sm-9">
        <div id="code_prod_complex">
        @if( session('status'))
                        <div class="alert alert-info">
                            {{ session('status')}}
                        </div>
                    @endif
            <div class="row">
           
            @forelse($products as $product)
                    <div class="col-md-3">
                        <figure class="card card-product">
                            @if ($product->images->count() > 0)
                                <div class="img-wrap padding-y"><img src="{{ asset('storage/'.$product->images->first()->full) }}" alt=""></div>
                            @else
                                <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
                            @endif
                            <figcaption class="info-wrap">
                                <h4 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                            </figcaption>
                           
                            <div class="bottom-wrap">
                                <a href="{{ route('product.show', $product->slug) }}" class="btn btn-sm btn-success float-right">View Details</a>
                               
                                
                                @if ($product->sale_price != 0)
                                    <div class="price-wrap h5">
                                        <span class="price"> {{ config('settings.currency_symbol').$product->sale_price }} </span>
                                        <del class="price-old"> {{ config('settings.currency_symbol').$product->price }}</del>
                                    </div>
                                @else
                                    <div class="price-wrap h5">
                                        <span class="price"> {{ config('settings.currency_symbol').$product->price }} </span>
                                    </div>
                                @endif
                  
                            </div>
                         
                        </figure>
                    </div>
                     
                         
                   
                    @empty
                    <p>No Products found </p>
                @endforelse
            </div>
            {{ $products->links() }}
        </div>
        </main>
       
    </div>
   
</section>
@stop
