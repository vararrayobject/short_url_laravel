{{-- 
/**
 * ==================================================================================================
 * @author Yogesh Gholap
 * @email yagholap@gmail.com
 * @create date 2021-06-17
 * @modify date 2021-06-17
 * @desc [description]
 * ==================================================================================================
 */
--}}

@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="col-12">
        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
            <div>
                <h1>Urls</h1>
            </div>
            <div>
                <a type="button" href="{{route('urls.create')}}" class="btn btn-primary">Add URL</a>
            </div>
        </div>
        <div class="tab-wrapper">
            <div class="card">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <table class="table table-bordered" id="basic-data-table">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Short Url</th>
                                <th>Long Url</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($urls as $key => $url)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ url('/') . '/' . $url->code }}</td>
                                <td>{{ $url->link }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $urls->links() }}
            </div>
        </div>
    </div>
</div>
@endsection