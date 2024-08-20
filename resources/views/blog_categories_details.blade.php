@extends('layouts.app')
@section('content')

<section class="section-box bg-banner-about banner-home-3 pages blog  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{ __('Blog') }} {{ __('Category') }} </h3>
                        
                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li><a href="{{ route('blogs') }}">{{__('blogs')}}</a></li>
                                    <li>{{$category->heading}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="post-loop-grid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">

                    @if(null!==($blogs))
                    <?php $count = 1; ?>
                    @foreach($blogs as $blog)
                    <?php
                        $cate_ids = explode(",", $blog->cate_id);
                        $data = DB::table('blog_categories')->whereIn('id', $cate_ids)->get();

                        $cate_array = [];
                     
                        foreach ($data as $cat) {
                            $cate_array[] = "<a href='" . url('/blog/category/') . "/" . $cat->slug . "'>$cat->heading</a>";
                        
                    }
                        ?>

                    @if($count == 1)
                    <!-- Custom design for the first blog post -->
                    <div class="col-lg-12 mb-30">
                        <div class="card-blog-1 hover-up wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                            <figure class="post-thumb mb-15">
                                <a href="{{ route('blog-detail', $blog->slug) }}">
                                    <div class="postimg">{{ $blog->printBlogImage() }}</div>
                                </a>
                            </figure>
                            <div class="card-block-info">
                                <div class="post-meta text-muted d-flex align-items-center mb-15">
                                    <div class="author d-flex align-items-center mr-30">
                                        <span>{{ __('Category') }} : {!! implode(', ', $cate_array) !!}</span>
                                    </div>
                                    <div class="date">
                                        <span><i class="fi-rr-edit mr-5 text-grey-6"></i>{{ $blog->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                                <h3 class="post-title mb-15">
                                    <a href="{{ route('blog-detail', $blog->slug) }}">{{ $blog->heading }}</a>
                                </h3>
                                <p class="post-excerpt text-muted">
                                    {!! \Illuminate\Support\Str::limit($blog->content, 150, '...') !!}
                                </p>
                                <div class="card-2-bottom mt-30">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="keep-reading">
                                            <a href="{{ route('blog-detail', $blog->slug) }}" class="btn btn-border btn-brand-hover">Keep reading</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <!-- Original design for the other blog posts -->
                    <div class="col-lg-6 mb-30">
                        <div class="card-blog-1 hover-up wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                            <figure class="post-thumb mb-15">
                                <a href="{{ route('blog-detail', $blog->slug) }}">
                                    <div class="postimg">{{ $blog->printBlogImage() }}</div>
                                </a>
                            </figure>
                            <div class="card-block-info">
                                <div class="post-meta text-muted d-flex align-items-center mb-15">

                                    <div class="author d-flex align-items-center mr-30">
                                        <span>Category: {!! implode(', ', $cate_array) !!}</span>
                                    </div>
                                    <div class="date">
                                        <span><i class="fi-rr-edit mr-5 text-grey-6"></i>{{ $blog->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                                <h3 class="post-title small mb-15">
                                    <a href="{{ route('blog-detail', $blog->slug) }}">{{ $blog->heading }}</a>
                                </h3>
                                <p>{!! \Illuminate\Support\Str::limit($blog->content, $limit = 150, $end = '...') !!}</p>

                                <div class="card-2-bottom mt-30">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="keep-reading">
                                            <a href="{{ route('blog-detail', $blog->slug) }}" class="btn btn-border btn-brand-hover">Keep reading</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <?php $count++; ?>
                    @endforeach
                    @endif

                    @if ($blogs->hasPages())
                    <div class="paginations wow animate__animated animate__fadeIn">
                        <ul class="pager">

                            {{-- Previous Page Link --}}
                            @if ($blogs->onFirstPage())
                            <li><a href="javascript:void(0);" class="pager-prev disabled"></a></li>
                            @else
                            <li><a href="{{ $blogs->previousPageUrl() }}" class="pager-prev"></a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($blogs->links()->elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                            <li><a href="javascript:void(0);" class="pager-number">{{ $element }}</a></li>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                            @foreach ($element as $page => $url)
                            @if ($page == $blogs->currentPage())
                            <li><a href="javascript:void(0);" class="pager-number active">{{ $page }}</a></li>
                            @else
                            <li><a href="{{ $url }}" class="pager-number">{{ $page }}</a></li>
                            @endif
                            @endforeach
                            @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($blogs->hasMorePages())
                            <li><a href="{{ $blogs->nextPageUrl() }}" class="pager-next"></a></li>
                            @else
                            <li><a href="javascript:void(0);" class="pager-next disabled"></a></li>
                            @endif

                        </ul>
                    </div>
                    @endif

                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                <div class="widget_search mb-40">
                    <div class="search-form">
                        <form action="{{route('blog-search')}}" method="GET">
                            <input type="text" name="search" placeholder="Search…">
                            <button type="submit"><i class="fi-rr-search"></i></button>
                        </form>

                    </div>
                </div>
                @if(null!==($blogs_categories))
                <div class="sidebar-shadow widget-categories">
                    <h5 class="sidebar-title">Category</h5>
                    <ul>
                        @foreach($blogs_categories as $category)
                        <li class="d-flex justify-content-between align-items-center">
                            <a href="{{url('/blog/category/').'/'.$category->slug}}">{{$category->heading}}</a>
                            {{--  <span class="count">{{ $category->blogs()->count() }}</span>  --}}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="sidebar-shadow sidebar-news-small">
                    <h5 class="sidebar-title">Latest Blogs</h5>
                    <div class="post-list-small">
                        @foreach($latestBlogs as $blog)
                        <div class="post-list-small-item d-flex align-items-center">
                            <figure class="thumb mr-15">
                                <a href="{{ route('blog-detail', $blog->slug) }}">
                                    <div class="postimg">{{ $blog->printBlogImage() }}</div>
                                </a>
                            </figure>

                            <div class="content">
                                <h5> <a href="{{ route('blog-detail', $blog->slug) }}">{{ $blog->heading }}</a></h5>
                                <div class="post-meta text-muted d-flex align-items-center mb-15">
                                    <div class="author d-flex align-items-center mr-20">
                                        @if(isset($cate_array))
                                        <span>Category: {!! implode(', ', $cate_array) !!}</span>
                                        @endif
                                     </div>
                                    <div class="date">
                                        <span><i class="fi-rr-edit mr-5 text-grey-6"></i>{{ $blog->created_at->format('d M Y') }}</span> </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>


                </div>
            </div>


        </div>
    </div>


    @endsection
    @push('styles')
    <style>
        .plus-minus-input {
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .plus-minus-input .input-group-field {
            text-align: center;
            margin-left: 0.5rem;
            margin-right: 0.5rem;
            padding: 0rem;
        }

        .plus-minus-input .input-group-field::-webkit-inner-spin-button,
        .plus-minus-input .input-group-field ::-webkit-outer-spin-button {
            -webkit-appearance: none;
            appearance: none;
        }

        .plus-minus-input .input-group-button .circle {
            border-radius: 50%;
            padding: 0.25em 0.8em;
        }

    </style>
    @endpush
    @push('scripts')
    @include('includes.immediate_available_btn')
    <script>
    </script>
    @endpush
