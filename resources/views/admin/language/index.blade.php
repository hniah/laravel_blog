@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') {!! trans("admin/language.languages") !!} ::
@parent @endsection

@section('styles')
    @parent
    <link href="{{ asset("css/flags.css") }}" rel="stylesheet">
@endsection

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            {!! trans("admin/language.languages") !!}

            <div class="pull-right">
                <a href="{!!  url('admin/languages/create') !!}"
                   class="btn btn-sm  btn-primary iframe"><span
                            class="glyphicon glyphicon-plus-sign"></span> {!!
				trans("admin/modal.new") !!}</a>
            </div>
        </h3>
    </div>

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>{{ trans("admin/modal.title") }}</th>
            <th>{{ trans("admin/language.code") }}</th>
            <th>{{ trans("admin/language.icon") }}</th>
            <th>{{ trans("admin/admin.action") }}</th>
        </tr>
        </thead>
        <tbody>
            @foreach($languages as $key => $language)
                <tr>
                    <td>{{ $language->name }}</td>
                    <td>{{ $language->lang_code }}</td>
                    <td><img class="flag flag-{{ $language->lang_code }}" alt="" /></td>
                    <td>
                      <a class='btn btn-primary' href="{!!  url('admin/languages/'.$language->id.'/edit') !!}">Edit</a> 
                      {{ Form::open(['method' => 'DELETE', 'class'=>'inline', 'route' => ['languages.destroy', $language->id]]) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                      {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

{{-- Scripts --}}
@section('scripts')
@endsection
