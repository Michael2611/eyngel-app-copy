@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Anuncio
@endsection

@section('content')
<div class="mx-auto" style="width: 87%">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Anuncio</span>
                    </div>
                    <div class="card-body p-4">
                        <section class="">
                            <div class="row">
                                <div class="col-md-12">

                                    @includeif('partials.errors')
                                    <form method="POST" action="{{ URL::to('/admin/anuncios-store') }}"  role="form" enctype="multipart/form-data">
                                        @csrf

                                        @include('anuncio.form')

                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
