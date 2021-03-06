@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <h3 class="col-sm-8">Subject: {{ $keyResult->subject }}</h3>
            <div class="col-sm-4">Owner: {{ $owner->name }}</div>
          </div>
        </div>
        <div class="panel-body">
          <h4>Description</h4>
          {{ $keyResult->description }}

          <h4>Objective</h4>
          {{ $keyResult->objective->subject }}

        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading"><h3>Fulfillment</h3></div>
        <div class="panel-body">
          <h4>Target</h4>
          {{ $keyResult->target_value }} {{ $keyResult->target_unit }}
          <h4>Fulfillment</h4>
          <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $keyResult->currentFulfillmentPercentage() }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $keyResult->currentFulfillmentPercentage() }}%;">
              {{ $keyResult->currentFulfillmentPercentage() }}%
            </div>
          </div>

          <h4>Progress</h4>
          <ul>
          @foreach ($keyResult->fulfillment_progresses as $progress)
            <li>{{ $progress->created_at }} {{ $progress->fulfilled_value }} {{ $keyResult->target_unit }}</li>
          @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection