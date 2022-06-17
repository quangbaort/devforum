@unless ($breadcrumbs->isEmpty())
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        @foreach ($breadcrumbs as $breadcrumb)
                            @if ($breadcrumb->url && !$loop->last)
                                <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                            @else
                                <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb->title }}</li>
                            @endif
                        @endforeach
                    </ol>
                </div>
                <h4 class="page-title">{{ $breadcrumb->title }}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
@endunless
