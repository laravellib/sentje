@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{__('group.edit_group')}}
                        <p class="float-right">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#openModal">
                                {{__('group.delete_group')}}
                            </button>
                        </p>
                    </div>

                    <div class="card-body">
                        {!! Form::open(['action' => ['GroupController@update', $group->id], 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{Form::label('name', __('account.name'))}}
                            {{Form::text('name', $group->name, ['class' => 'form-control', 'placeholder' => __('account.name')])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('description', __('group.description'))}}
                            {{Form::textarea('description', $group->description, ['class' => 'form-control', 'placeholder' => __('group.description')])}}
                        </div>
                        {{Form::hidden('_method', 'PUT')}}
                        {{Form::submit(__('group.edit_group'), ['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}

                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>{{__('account.name')}}</th>
                                <th>{{__('account.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <h3 class="text-center">{{__('group.add_contact')}}</h3>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{$contact->name}}</td>
                                    <td>
                                        {!!Form::open(['action' => ['GroupController@storeContact', $group->id, $contact->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit(__('group.add_to_group'), ['class' => 'btn btn-success btn-block'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5">{{$contacts->links()}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <h3 class="text-center">{{__('group.contacts')}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@include('inc.modal', ['title'=>__('group.delete_group'), 'body' => __('group.delete_confirm'),
		'action' => 'GroupController@destroy', 'id' => $group->id, 'method' => 'DELETE', 'buttonText' => __('group.delete')])