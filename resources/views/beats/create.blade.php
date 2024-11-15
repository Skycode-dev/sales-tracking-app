@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Create Beat</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('beats.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="region_zone_id">Zone</label>
                <select name="region_zone_id" id="region_zone_id" class="form-control">
                    <option value="">Select Zone</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->region_zone }}">{{ $region->region_zone }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="state_id">State</label>
                <select name="state_id" id="state_id" class="form-control">
                    <option value="">Select State</option>
                    <!-- States will be populated based on selected zone -->
                </select>
            </div>

            <div class="form-group">
                <label for="district_id">City</label>
                <select name="district_id" id="district_id" class="form-control">
                    <!-- Populate cities based on selected state -->
                </select>
            </div>
            <div class="form-group">
                <label for="area">Area</label>
                <select name="area" id="area_id" class="form-control"></select>
            </div>

            <!-- Beat fields -->
            @for ($i = 1; $i <= 12; $i++)
                <div class="form-group">
                    <label for="beat_{{ $i }}">Beat {{ $i }}</label>
                    <input type="text" name="beat_{{ $i }}" id="beat_{{ $i }}"
                        class="form-control">
                </div>
            @endfor

            <div class="form-group">
                <label for="emp_role_id">EMP Role</label>
                <select name="emp_role_id" id="emp_role_id" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="customer_type">Customer Type</label>
                <select name="customer_type" id="customer_type" class="form-control">
                    @foreach ($types as $type)
                        <option value="{{ $type->customer_type }}">{{ $type->customer_type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="customer_name">Customer Name</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save Customer</button>
        </form>
    </div>
@endsection
